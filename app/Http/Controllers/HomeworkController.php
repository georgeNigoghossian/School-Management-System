<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use App\Models\Course;
use App\Models\Homework_Answer;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeworkController extends Controller
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

    public function create(){
        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();
        $courses=$teacher->course;
        return view('teacher.homework.create_homework',compact('courses'));
    }
    
    public function correct_homework(Request $request)
    {
        $student=DB::table('active_homeworks')
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
            $homeworks=Homework::where('course_id',$id)->get();
        }else{
        $homeworks=Homework::whereIn('course_id',$courses_id)->get();
        }

        return view('teacher.homework.correct_homework',compact('courses','homeworks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeworkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title'=>'required',
            'homework_date'=>'required',
            'file'=>'required',
            'course_id'=>'required',

        ]);

        $homework = Homework::query()->create([
            'title'=>$request->title,
            'homework_date'=>$request->homework_date,
            'course_id'=>$request->course_id,
        ]);

        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Homework'), $filename);
            $homework->file= $filename;
        }
        $homework->save();

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
            $student->active_homework()->attach($homework->id);
         }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeworkRequest  $request
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeworkRequest $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        //
    }

    public function finishedHomeworks(){
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        $marks = Mark::where('student_id',$student->id)->whereNull('course_id')->whereNull('exam_id')->get();
        $student=DB::table('active_homeworks')->where('student_id',$student->id)
                                    ->update(array('seen'=>1));
        return view('student.homework.finished',compact('marks'));
    }

    public function newHomework(){
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        $courses=$student->classroom->course;
        foreach($courses as $key=>$course){
            $courses_id[$key]=$course->id;
        }

        $homeworks=Homework::whereIn('course_id',$courses_id)->get();
        $ids=[];
        foreach($homeworks as $homework){
            array_push($ids,$homework->id);
        }
        $active_homeworks = DB::table('active_homeworks')
                                ->whereIn('homework_id',$ids)
                                ->where('student_id',$student->id)
                                ->where('active',1)->get();
        
        $homeworks=[];
        foreach($active_homeworks as $homework){
            $homework = Homework::find($homework->homework_id);
        
            array_push($homeworks,$homework);
        }
        
        return view('student.homework.new_homework',compact('homeworks','student'));
    }

    public function view_homework(Request $request){
        $id=$request->homework_id;
        $homework=Homework::where('id',$id)->first();
        
        $homework_answers=Homework_Answer::where('homework_id',$homework->id)->get();
        
        return view('teacher.homework.view_homework',compact('homework_answers'));
    }
}
