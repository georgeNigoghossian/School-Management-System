<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Schedule;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms= Classroom::all();
        return view('admin.schedule.list',compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$day)
    {

        switch($day) {
            case('sun'):
                $schedule = Schedule::where('day','Sunday')->where('classroom_id',$id)->get();
                return view('admin.schedule.sunday',compact('id','schedule'));
                break;
            case('mon'):
                $schedule = Schedule::where('day','Monday')->where('classroom_id',$id)->get();
                return view('admin.schedule.monday',compact('id','schedule'));
                break;
            case('tue'):
                $schedule = Schedule::where('day','Tuesday')->where('classroom_id',$id)->get();
                return view('admin.schedule.tuesday',compact('id','schedule'));
                break;
            case('wed'):
                $schedule = Schedule::where('day','Wednesday')->where('classroom_id',$id)->get();
                return view('admin.schedule.wednesday',compact('id','schedule'));
                break;
            case('thu'):
                $schedule = Schedule::where('day','Thursday')->where('classroom_id',$id)->get();
                return view('admin.schedule.thursday',compact('id','schedule'));
                break;
                
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        if($request->input('time')!==null){
            $count=count($request->input('time'));
        }
        
        //  $validated = $request->validate([
        //      'time.*'=>'required',
        //      'course_id.*'=>'required',
        //  ]);
        if(isset($count)){
        for($i=0;$i<$count;$i++){
        $schedule = Schedule::updateOrCreate(
            ['time'=>$request->time[$i],
            'course_id'=>$request->course_id[$i],
            'classroom_id'=>$request->classroom_id,
            'day'=>$request->day,
            ]
            ,
            [
            'time'=>$request->time[$i],
            'course_id'=>$request->course_id[$i],
            'classroom_id'=>$request->classroom_id,
            'day'=>$request->day,
            ]
    );

            }
        }
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */

    function query($time,$id){
    
        $result= Schedule::where('classroom_id',$id)
                            ->where('time',$time)
                            ->orderByRaw("FIELD(day, \"Sunday\", \"Monday\", \"Tuesday\", \"Wednesday\", \"Thursday\")")
                            ->get();
        return $result;
    }

    public function show($id)
    {
        $times = Schedule::select('time')->where('classroom_id',$id)
                ->groupBy('time')
                ->get();
        
        $times=$times->toArray();
        $schedules=[];
        foreach($times as $key=>$time){
            $schedules[$key] = $this->query($time['time'],$id);
        }
       
        return view('admin.schedule.details',compact('times','schedules','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }


    public function studentSchdule(){
        $user=Session::get('user');
        $student=Student::where('email',$user->email)->first();
        $classroom_id=$student->classroom->id;

        $times = Schedule::select('time')->where('classroom_id',$classroom_id)
                ->groupBy('time')
                ->get();
        
        $times=$times->toArray();
        $schedules=[];
        foreach($times as $key=>$time){
            $schedules[$key] = $this->query($time['time'],$classroom_id);
        }
       
        return view('student.pages.schedule',compact('times','schedules','classroom_id'));
    }

    public function teacherSchdule(){
        $user=Session::get('user');
        $teacher=Teacher::where('email',$user->email)->first();
        
        $classroom_id=[];
        $schedules_arr=[];
        $count=0;
        $times_arr=[];
        foreach($teacher->classroom as $k=>$classroom){
        $classroom_id[]=$classroom->id;

        $times = Schedule::select('time')->where('classroom_id',$classroom_id[$k])
                ->groupBy('time')
                ->get();
            
        $times=$times->toArray();
        array_push($times_arr,$times);
        $schedules=array();
        $schedules_arr=array();
            foreach($times as $key=>$time){
                $schedules[$key] = $this->query($time['time'],$classroom_id[$k]);
               
            }
            
            $arr[$count]=array_merge($schedules_arr,$schedules);
            $count++;
           
        }
        $times=$times_arr;
        
        $times_blank=[];
        foreach($times as $key=>$time){
            
            foreach($time as $t){
                array_push($times_blank,$t);
            }
        }
        $times=$times_blank;
        
        $blank_arr=[];
        foreach($arr as $key=>$item){
            
            foreach($item as $i){
                array_push($blank_arr,$i);
            }
        }

        $arr=$blank_arr;
        return view('teacher.pages.schedule',compact('times','arr','classroom_id'));
    }
}
