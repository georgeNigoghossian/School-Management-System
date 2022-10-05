<?php

namespace App\Http\Controllers;

use App\Models\Student_Answer;
use App\Http\Requests\StoreStudent_AnswerRequest;
use App\Http\Requests\UpdateStudent_AnswerRequest;
use App\Models\Exam;
use App\Models\Exam_Question;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class StudentAnswerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudent_AnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answers = $request->input('answers'); 
        $question_id = $request->input('question_id'); 
        if($answers!=null && $answers!=''){
            
            foreach($answers as $key=>$answer){
                $answer = Student_Answer::query()->create([
                    'answer'=>$answer,
                    'exam_id'=>$request->exam_id,
                    'question_id'=>$question_id[$key],
                    'student_id'=>$request->student_id,
                ]);
                $answer->save();
            }
         
            $exam= Exam::find($request->exam_id);
            
            /*$exam->update([
                'active'=>0,
            ]);*/

            
            $active_exam = DB::table('active_exams')->where('exam_id',$request->exam_id)
            ->where('student_id',$request->student_id)
            ->update(array('active'=>0));
            
        
        }else{
            $total_mark=0;
            $correct_student_answers = $request->input('correct_answer'); 
           
            $id=$request->exam_id;
            $exam=Exam::find($id);
            $exam_correct_answers=$exam->answer;
            $exam_questions = $exam->question;
            $exam_total_mark = Exam_Question::where('exam_id',$id)->sum('mark');
           
            foreach($exam_correct_answers as $key=>$correct_answer){

                if(isset($correct_student_answers[$key] ) && $correct_answer->correct_answer==$correct_student_answers[$key]){
                    $total_mark+=$exam_questions[$key]->mark;
                }
            }

            $mark = Mark::query()->create([
                'note'=>'',
                'mark'=>$total_mark,
                'exam_id'=>$exam->id,
                'student_id'=>$request->student_id,
            ]);
    
            $mark->save();
           
            /*$exam->update([
                'active'=>0,
            ]);*/

            $active_exam = DB::table('active_exams')->where('exam_id',$request->exam_id)
            ->where('student_id',$request->student_id)
            ->update(array('active'=>0));
            
      
           
            return redirect()->route('student.new_exam')->with(compact('total_mark','exam_total_mark'));
        }
        return redirect()->route('student.new_exam');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_Answer  $student_Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Student_Answer $student_Answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_Answer  $student_Answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_Answer $student_Answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudent_AnswerRequest  $request
     * @param  \App\Models\Student_Answer  $student_Answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent_AnswerRequest $request, Student_Answer $student_Answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_Answer  $student_Answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_Answer $student_Answer)
    {
        //
    }

  
}
