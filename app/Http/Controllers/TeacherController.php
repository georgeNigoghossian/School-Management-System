<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $teacher=Teacher::where('id',$id)->first();
        return view('admin.teacher.details',compact('teacher'));

    }

    public function getTeachers(){
        $teachers = Teacher::with('classroom')->get();
        $classrooms = Classroom::all();
        return view('admin.teacher.list',compact('teachers','classrooms'));
    }

    public function register(){
        $courses = Course::all();
        return view('admin.teacher.teacher_register',compact("courses"));
    }
     

    public function updateTeacher($id){
        $teacher=Teacher::where('id',$id)->first();
        $courses = Course::all();
        return view('admin.teacher.update_form',compact('teacher','courses'));
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
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = $request->input('course_id');
        $courses=$courses[0];
        $courses_arr = preg_split ("/\,/", $courses);
        
        $validated = $request->validate([
           'first_name' => 'required', 
           'last_name' => 'required', 
           'address' => 'required', 
           'phone' => 'required', 
           'gender' => 'required',
           'image'=> 'required', 
           'email' => 'required', 
           'birthdate' => 'required', 
           'experience' => 'required',
           'password' => 'required',
        ]);
            
        $teacher = Teacher::query()->create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'birthdate'=>$request->birthdate,
            'experience'=>$request->experience,
            'password'=>$request->password,
        ]);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $teacher->image= $filename;
        }

           $teacher->save();
           $courses=[];
           foreach($courses_arr as $id){
            $courses=Course::find($id);
                foreach($courses->classroom as $classroom){
                    $record_exists = DB::table('classroom_teacher')->where('teacher_id',$teacher->id)->where('classroom_id',$classroom->id)->get();
                    $record_exists=$record_exists->toArray();
                    if(empty($record_exists)){
                      
                        $teacher->classroom()->attach($classroom->id);
                    }
                }
           }
          
           
           foreach($courses_arr as $id){
            $teacher->course()->attach($id);
            }
           
           


           $teacher_user = User::query()->create([
                'name'=>$request->first_name,
                'email'=>$request->email,
                'role'=>'teacher',
                'password'=>bcrypt($request->password),
            ]);
            $teacher_user->save();

           return redirect()->route('teacher.list');
        

    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $courses = $request->input('course_id');
        $courses=$courses[0];
        $courses_arr = preg_split ("/\,/", $courses);
        
        $teacher = Teacher::find($id);
        $teacher_email=$teacher->email;

        $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'password'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'image'=>'required',
            'birthdate'=>'required',
            'experience'=>'required',
           
        ]);

        
        $teacher->first_name=$request->first_name;
        $teacher->last_name=$request->last_name;
        $teacher->address=$request->address;
        $teacher->phone=$request->phone;
        $teacher->gender=$request->gender;
        $teacher->email=$request->email;
        $teacher->password=$request->password;
        $teacher->birthdate=$request->birthdate;
        $teacher->experience=$request->experience;
      

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $teacher->image= $filename;
        }

        
        $teacher->save();

        //DB::table('teacher_course')->where('teacher_id',$id)->whereIn('course_id',$courses_arr)->delete();

        $teacher->classroom()->detach();
        $teacher->course()->detach();
        
        $courses=[];
        foreach($courses_arr as $id){
         $courses=Course::find($id);
             foreach($courses->classroom as $classroom){
                 $record_exists = DB::table('classroom_teacher')->where('teacher_id',$teacher->id)->where('classroom_id',$classroom->id)->get();
                 $record_exists=$record_exists->toArray();
                 if(empty($record_exists)){
                   
                     $teacher->classroom()->attach($classroom->id);
                 }
             }
        }

        foreach($courses_arr as $id){
            $teacher->course()->attach($id);
        }
    
        $teacher_user = User::where('email',$teacher_email)->first();
        $teacher_user->update([
             'name'=>$request->first_name,
             'email'=>$request->email,
             'role'=>'teacher',
             'password'=>bcrypt($request->password),
         ]);

         return redirect()->route('teacher.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        User::where('email',$teacher->email)->delete();
        $teacher->delete();

        return redirect()->back();
    }
    
    public function homepage(){
        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();  
        $courses=[];
        $classrooms=[];
        foreach($teacher->course as $course){
            array_push($courses,$course->name);
            array_push($classrooms,$course->classroom);   
        }
        
        return view('teacher.homepage',compact('teacher','courses','classrooms'));
    }
}
