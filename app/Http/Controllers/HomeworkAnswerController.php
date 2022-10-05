<?php

namespace App\Http\Controllers;

use App\Models\Homework_Answer;
use App\Http\Requests\StoreHomework_AnswerRequest;
use App\Http\Requests\UpdateHomework_AnswerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeworkAnswerController extends Controller
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
     * @param  \App\Http\Requests\StoreHomework_AnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $homework = Homework_Answer::query()->create([
            'homework_id'=>$request->homework_id,
            'student_id'=>$request->student_id,
        ]);
        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/HomeworksDone'), $filename);
            $homework->file= $filename;
        }
        $homework->save();
        $active_homework = DB::table('active_homeworks')->where('homework_id',$request->homework_id)
                                            ->where('student_id',$request->student_id)
                                            ->update(array('active'=>0));
      
        
        
        return redirect()->route('student.new_homeworks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework_Answer  $homework_Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Homework_Answer $homework_Answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework_Answer  $homework_Answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework_Answer $homework_Answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomework_AnswerRequest  $request
     * @param  \App\Models\Homework_Answer  $homework_Answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomework_AnswerRequest $request, Homework_Answer $homework_Answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework_Answer  $homework_Answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework_Answer $homework_Answer)
    {
        //
    }
}
