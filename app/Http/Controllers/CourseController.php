<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.list',compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.add_course');
    }

    public function add(){
        $classrooms = Classroom::all();
        return view('admin.course.add_course',compact('classrooms'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classes = $request->input('classes');
        $classes=$classes[0];
        $classes_arr = preg_split ("/\,/", $classes);
        

        $validated = $request->validate([
            'name'=>'required',
            'file'=>'required',
        ]);

        $course = Course::query()->create([
            'name'=>$request->name,
        ]);

        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/File'), $filename);
            $course->file= $filename;
        }

      
        $course->save();
        foreach($classes_arr as $id){
            $course->classroom()->attach($id);
        }
        return redirect()->route('course.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('id', $id)->delete();

        return redirect()->back();
    }

    
    public function studentCourses(){
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        $courses=$student->classroom->course;
        return view('student.pages.courses',compact('courses'));
    }

}
