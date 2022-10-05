<?php

namespace App\Http\Controllers;

use App\Models\student_absence;
use App\Http\Requests\Storestudent_absenceRequest;
use App\Http\Requests\Updatestudent_absenceRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $students = Student::with('classroom')->get();
         $classrooms = Classroom::all();
         
         return view('admin.absence.list',compact('students','classrooms'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        $courses = $student->classroom->course;
    
        return view('admin.absence.add',compact('courses','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storestudent_absenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       
        $justified = $request->input('justified');
        
        if(!isset($justified)){
            $justified=0;
        }else{
            $justified=1;
        }
        
        $validated = $request->validate([
            'day'=>'required',
            'cause'=>'required',
        ]);
        $absence = student_absence::query()->create([
            'day'=>$request->day,
            'cause'=>$request->cause,
            'justified'=>$justified,
            'student_id'=>$id,
            'course_id'=>$request->course_id
        ]);
        $absence->save();

        return redirect()->route('absences.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student_absence  $student_absence
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reasons = student_absence::where('student_id',$id)->get();
        return view('admin.absence.details',compact('reasons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student_absence  $student_absence
     * @return \Illuminate\Http\Response
     */
    public function edit(student_absence $student_absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatestudent_absenceRequest  $request
     * @param  \App\Models\student_absence  $student_absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $absence = student_absence::find($id);

        $validated = $request->validate([
            'day'=>'required',
            'cause'=>'required',
            'justified'=>'required',
        ]);

        $absence->day=$request->day;
        $absence->cause=$request->cause;
        $absence->justified=$request->justified;

        $absence->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student_absence  $student_absence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student_absence::where('id', $id)->delete();
    }
    
}
