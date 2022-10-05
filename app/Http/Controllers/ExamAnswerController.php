<?php

namespace App\Http\Controllers;

use App\Models\Exam_Answer;
use App\Http\Requests\StoreExam_AnswerRequest;
use App\Http\Requests\UpdateExam_AnswerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamAnswerController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExam_AnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$question_arr)
    {
        $answers1 = $request->input('answers1');
        $answers2 = $request->input('answers2');
        $answers3 = $request->input('answers3');
        $answers4 = $request->input('answers4');
        $correct_answers = $request->input('correct_answers');
        
        /*$validated = $request->validate([
            'answer'=>'required'
        ]);*/
       
        if(isset($answers1) && $answers1!=''){
        foreach($answers1 as $key=>$answer){
            $exam_answer = Exam_Answer::query()->create([
                'answer1'=>$answers1[$key],
                'answer2'=>$answers2[$key],
                'answer3'=>$answers3[$key],
                'answer4'=>$answers4[$key],
                'correct_answer'=>$correct_answers[$key],
                'exam_id'=>$id,
                'question_id'=>$question_arr[$key],
                ]);
                $exam_answer->save();
            }      
    }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam_Answer  $exam_Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Exam_Answer $exam_Answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam_Answer  $exam_Answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam_Answer $exam_Answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExam_AnswerRequest  $request
     * @param  \App\Models\Exam_Answer  $exam_Answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExam_AnswerRequest $request, Exam_Answer $exam_Answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam_Answer  $exam_Answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam_Answer::find($id)->delete();
    }
}
