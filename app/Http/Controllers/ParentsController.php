<?php

namespace App\Http\Controllers;

use App\Models\parents;
use App\Http\Requests\StoreparentsRequest;
use App\Http\Requests\UpdateparentsRequest;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\student_absence;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function query($time,$id){
    
        $result= Schedule::where('classroom_id',$id)
                            ->where('time',$time)
                            ->orderByRaw("FIELD(day, \"Sunday\", \"Monday\", \"Tuesday\", \"Wednesday\", \"Thursday\")")
                            ->get();
        return $result;
    }

    public function index()
    {
        $user=Session::get('user');
        $parent=parents::where('email',$user->email)->first();
        $student=$parent->getStudent->toArray();
        
        $classroom_id=$student[0]['classroom_id'];

        $times = Schedule::select('time')->where('classroom_id',$classroom_id)
                ->groupBy('time')
                ->get();
        
        $times=$times->toArray();
        $schedules=[];
        foreach($times as $key=>$time){
            $schedules[$key] = $this->query($time['time'],$classroom_id);
        }
       
        $classroom_teachers =DB::table('classroom_teacher')->where('classroom_id',$classroom_id)->get();
        
        $teachers=[];
        $course_names=[];
        foreach($classroom_teachers as $teacher){
            $teacher = Teacher::where('id',$teacher->teacher_id)->first();
            $course=$teacher->course->toArray();
            $course_name=array_column($course,'name');
            array_push($teachers,$teacher);
            array_push($course_names,$course_name);
        }
        $absences = student_absence::where('student_id',$student[0]["id"])
                                    ->orderBy('created_at','desc')->limit(6)->get();
        return view('parent.homepage',compact('times','schedules','classroom_id','teachers','course_names','absences'));
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
     * @param  \App\Http\Requests\StoreparentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreparentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function show(parents $parents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function edit(parents $parents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateparentsRequest  $request
     * @param  \App\Models\parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateparentsRequest $request, parents $parents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function destroy(parents $parents)
    {
        //
    }
}
