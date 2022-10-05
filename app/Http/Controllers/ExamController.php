<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Exam_Answer;
use App\Models\Exam_Question;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Student_Answer;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();
        $courses=$teacher->course;
        
        return view('teacher.exam.add_exam',compact('courses','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_mark = $request->total_mark;
        $marks_arr = $request->input('marks');
        
        $sum=0;
        foreach($marks_arr as $mark){
            $sum+=$mark;
            
        }
        if($sum!=$total_mark){
            return view('teacher.exam.exam_error_popup');   
        }
        
      
        /*$validated = $request->validate([
            'name' => 'required', 
            'number_of_questions' => 'required', 
            'exam_date' => 'required', 
            'exam_duration' => 'required', 
            'course_id' => 'required', 
            'total_mark' => 'required', 
            'exam_time' => 'required',
            'type' => 'required',
             
        ]); */
        
         
        $exam = Exam::query()->create([
        	'name'=>$request->name,
        	'number_of_questions'=>$request->number_of_questions,
        	'exam_date'=>$request->exam_date,
        	'exam_duration'=>$request->exam_duration,
        	'course_id'=>$request->course_id,
        	'total_mark'=>$request->total_mark,
        	'exam_time'=>$request->exam_time,
        	'exam_type'=>$request->exam_type,
            'active'=>1,
        ]);
        
        $exam->save();
                
        $exam_question_controller = new ExamQuestionController();
        $question_arr=$exam_question_controller->store($request,$exam->id);

        $exam_answer_controller = new ExamAnswerController();
        $exam_answer_controller->store($request,$exam->id,$question_arr);

        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();
        $courses=$teacher->course;
        $classroom_course=[];
        foreach($courses as $key=>$course){
            if($course->id==$request->course_id)
            array_push($classroom_course,$course->classroom);
        }
        $classroom_id=[];
        foreach($classroom_course as $classroom){
            foreach($classroom as $c){            
                array_push($classroom_id,$c->id);
            }
        }

        $students=Student::whereIn('classroom_id',$classroom_id)->get();
        
         foreach($students as $student){
            $student->active_exams()->attach($exam->id);
         }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();

        $exams = Exam::all();
        $ids=[];
        foreach($exams as $exam){
            array_push($ids,$exam->id);
        }
        $active_exams = DB::table('active_exams')
                                ->whereIn('exam_id',$ids)
                                ->where('student_id',$student->id)
                                ->where('active',1)->get();
        
        $exams=[];
        foreach($active_exams as $exam){
            $exam = Exam::find($exam->exam_id);
        
            array_push($exams,$exam);
        }

        return view('student.exam.new_exam',compact('exams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $examAnswers =  Exam_Answer::find($id)->delete();
        $examQuestions =  Exam_Question::find($id)->delete();
        
        $exam=Exam::find($id)->delete();
    }
    
    public function getExamQuetions($id){
        $exam = Exam::find($id);

        $examQuestion = $exam->getQuestion();
       
    }
    public function getExamAnswers($id){
        $exam = Exam::find($id);

        $examAnswer = $exam->getAnswer();
    }

    public function makeExam($id){
        $answers='';
        $exam = Exam::find($id);
        $questions = $exam->question;
        
        if( $exam->exam_type=="traditional"){           
            return view('student.exam.online_exam',compact('exam','questions'));
       }else{
            $answers = $exam->answer; 
            return view('student.exam.online_exam',compact('exam','answers','questions'));

       }
    }

    public function correct_exam(Request $request)
    {
        $student=DB::table('student_answers')
                                    ->update(array('seen_by_teacher'=>1));
        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();
        $courses=$teacher->course;
        $courses_id=[];
        foreach($courses as $key=>$course){
            $courses_id[$key]=$course->id;
        }

        if ($request->has('course_id')) {
            $id=$request->input('course_id');
            $exams=Exam::where('course_id',$id)->where('exam_type','traditional')->get();
        }else{
        $exams=Exam::whereIn('course_id',$courses_id)->where('exam_type','traditional')->get();
        }

        return view('teacher.exam.correct_exam',compact('courses','exams'));
    }

    public function submitExamMarks(Request $request){
        $marks = $request->mark;
        $sum=0;
        foreach($marks as $key=>$mark){
            $sum += $mark;
        }
        $mark = Mark::create([
            'note'=>'',
            'mark'=>$sum,
            'exam_id'=>$request->exam_id,
            'student_id'=>$request->student_id,
        ]);

        return redirect()->route('exam.correct-exam');
    }

    public function showFinishedExams(){
        
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        $marks = Mark::where('student_id',$student->id)->whereNotNull('exam_id')->get();
        $student=DB::table('active_exams')->where('student_id',$student->id)
                                    ->update(array('seen'=>1));
    
        return view('student.exam.finishedexam',compact('marks'));
    }

    public function finished_exam(Request $request){
        
            $id=$request->exam_id;
            
            $exam=Exam::where('id',$id)->first();
            
            $exam_answers = Student_Answer::where('exam_id',$exam->id)->groupBy('student_id')->get();
            
            return view('teacher.exam.finished_exams',compact('exam_answers'));
        
    }

    public function view_finished_exam(Request $request){
        $answers = Student_Answer::where('exam_id',$request->exam_id)->where('student_id',$request->student_id)->get();
     
        return view('teacher.exam.finished_exam_details',compact('answers'));
    }
}
