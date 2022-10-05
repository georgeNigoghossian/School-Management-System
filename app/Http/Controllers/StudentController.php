<?php

namespace App\Http\Controllers;

use App\Models\parents;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Http\Controllers\StudentPaymentController;
use App\Models\ExamEvent;
use App\Models\Schedule;
use App\Models\Student_Note;
use App\Models\Student_Payment;
use App\Models\StudentNoteReply;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function homepage()
    {
        
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();    
        

        $parent = $student->getParent->toArray();

        $events = ExamEvent::orderBy('start','desc')->limit(6)->get();
   
        $classroom_courses_count = DB::table('clasroom_courses')->where('classroom_id',$student->classroom_id)->count();
        $exams_count = DB::table('active_exams')->where('student_id',$student->id)->count();
        $homeworks_count = DB::table('active_homeworks')->where('student_id',$student->id)->count();
  
        return view('student.homepage',compact("events","student","parent","classroom_courses_count","exams_count","homeworks_count"));
    }

    public function index($id)
    {
   
        $student=Student::where('id',$id)->first();
        return view('admin.student.details',compact("student"));

    }

    public function register(){
        $classrooms=Classroom::all();
        return view('admin.student.student_register',compact("classrooms"));
    }

    public function getStudents(){
        
        $students = Student::with('classroom')->get();
        $classrooms = Classroom::all();
        return view('admin.student.list',compact('students','classrooms'));
    }

    public function updateStudent($id){
        $student=Student::where('id',$id)->first();
        $classrooms=Classroom::all();
        return view('admin.student.update_form',compact('student','classrooms'));
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
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $classroom = Classroom::find($request->classroom_id);
        $students_of_classroom = Student::where('classroom_id',$classroom->id)->count();
       
        if( $students_of_classroom+1 > $classroom->number_of_students){
            return view('admin.student.max_class_popup');
        }

        $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'home_phone'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=>'required',
            'birthdate'=>'required',
            'parent_full_name'=>'required',
            'parent_password'=>'required',
            'parent_email'=>'required',
            'parent_phone'=>'required',
            'registration_number'=>'required',
            'classroom_id'=>'required',
        ]);

        $student = Student::query()->create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'address'=>$request->address,
        'password'=>$request->password,
        'phone'=>$request->phone,
        'home_phone'=>$request->home_phone,
        'gender'=>$request->gender,
        'email'=>$request->email,
        'birthdate'=>$request->birthdate,
        'registration_number'=>$request->registration_number,
        'classroom_id'=>$request->classroom_id,
        ]);
            
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $student->image= $filename;
        }
        $student->save();
        
        $parent = parents::query()->create([
            'full_name'=>$request->parent_full_name,
            'password'=>$request->parent_password,
            'email'=>$request->parent_email,
            'phone'=>$request->parent_phone
        ]);
        $parent->save();
        //dd($parent->id);
        $student->getParent()->attach($parent->id);

        
        $student_user = User::query()->create([
            'name'=>$request->first_name,
            'email'=>$request->email,
            'role'=>'student',
            'password'=>bcrypt($request->password),
        ]);
        $student_user->save();

        $parent_user = User::query()->create([
            'name'=>$request->parent_full_name,
            'email'=>$request->parent_email,
            'role'=>'parent',
            'password'=>bcrypt($request->parent_password),
        ]);
        $parent_user->save();

        $payment = new StudentPaymentController;

        $payment->store($student);
        

        return redirect()->route('student.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student_email=$student->email;
        $parent = $student->getParent;
        $parent_email = $parent[0]->email;
        
        $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'home_phone'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=>'required',
            'birthdate'=>'required',
            'parent_full_name'=>'required',
            'parent_password'=>'required',
            'parent_email'=>'required',
            'parent_phone'=>'required',
            'registration_number'=>'required',
            'classroom_id'=>'required',
        ]);

        $student->first_name=$request->first_name;
        $student->last_name=$request->last_name;
        $student->address=$request->address;
        $student->phone=$request->phone;
        $student->home_phone=$request->home_phone;
        $student->gender=$request->gender;
        $student->email=$request->email;
        $student->password=$request->password;
        $student->birthdate=$request->birthdate;        
        $student->classroom_id=$request->classroom_id;        
        //dd($student->id);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $student->image= $filename;
        }
        
        $student->save();
        $parent[0]->update(['full_name'=>$request->parent_full_name,
                                        'password'=>$request->parent_password,
                                        'email'=>$request->parent_email,
                                        'phone'=>$request->parent_phone]);

        $student_user = User::where('email',$student_email)->first();
         $student_user->update([
             'name'=>$request->first_name,
             'email'=>$request->email,
             'role'=>'student',
             'password'=>bcrypt($request->password),
         ]);


         $parent_user = User::where('email',$parent_email)->first();
         $parent_user->update([
             'name'=>$request->parent_full_name,
             'email'=>$request->parent_email,
             'role'=>'parent',
             'password'=>bcrypt($request->parent_password),
         ]);
         return redirect()->route('student.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        User::where('email',$student->email)->delete();
        User::where('email',$student->getParent[0]->email)->delete();
        $student->delete();
        $student_payments = Student_Payment::where('student_id',$id)->delete();
       
        // if(isset($student_payments) && $student->payments!=''){
          
        //     $student_payments->delete();
        // }
            return redirect()->back();
    }

    public function search(Request $request){
        $search=$request->input('search');
     
        if(!is_null($search)){
        $studentResults=Student::query()
             ->where('first_name', 'LIKE', "%{$search}%") 
             ->orWhere('registration_number', 'LIKE', "%{$search}%") 
             ->get();
    
        $teacherResults=Teacher::query()
             ->where('first_name', 'LIKE', "%{$search}%")
             ->get();
        }else{
            $results=null;
        }
   
        return view('admin.additional.search',compact('studentResults','teacherResults'));  
        
    }

    public function filterStudents(Request $request){
       
    
        $query = student::query();
        $classrooms = Classroom::all();
        if($request->ajax()){
            $students = $query->where(['classroom_id'=>$request->classroom_id])->get();
            
        }
        $students = $query->get();
        return view('admin.student.list',compact('students','classrooms'));
    }

    public function studentDetails(){
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        return view('student.pages.details',compact('student'));

    }

    public function sendComplaint(){
        return view('student.pages.complaint');
    }

    public function submitComplaint(Request $request){
        $validated = $request->validate([
            'full_name'=>'required',
            'notes'=>'required',
        ]);
        $note = Student_Note::query()->create([
            'notes'=>$request->notes,
            'student_id'=>$request->student_id,
        ]);

        return redirect()->back();
    }

    public function showReplies(){
                
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();

        $replies = StudentNoteReply::where('student_id',$student->id)->get();
        $student=DB::table('student__notes_replies')->where('student_id',$student->id)->update(array('seen'=>1));
        return view('student.pages.replies',compact('replies'));
    }   
 
    public function deleteReply(Request $request){
       
        $replies = StudentNoteReply::where('id',$request->id)->delete();

        return redirect()->back();
    }
}
