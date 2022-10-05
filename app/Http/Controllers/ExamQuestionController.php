<?php

namespace App\Http\Controllers;

use App\Models\Exam_Question;
use App\Http\Requests\StoreExam_QuestionRequest;
use App\Http\Requests\UpdateExam_QuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreExam_QuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $questions = $request->input('questions');
        $marks = $request->input('marks');
        
        /*$validated = $request->validate([
            'questions'=>'required'
        ]);*/

        $question_arr=[];
        foreach($questions as $key=>$question){
        $exam_question = Exam_Question::query()->create([
        	'question'=>$question,
            'mark'=>$marks[$key],
            'exam_id'=>$id,
        ]);

            $exam_question->save();
            $question_arr[$key]=$exam_question->id;
        }
        return $question_arr;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam_Question  $exam_Question
     * @return \Illuminate\Http\Response
     */
    public function show(Exam_Question $exam_Question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam_Question  $exam_Question
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam_Question $exam_Question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExam_QuestionRequest  $request
     * @param  \App\Models\Exam_Question  $exam_Question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExam_QuestionRequest $request, Exam_Question $exam_Question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam_Question  $exam_Question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam_Question::find($id)->delete();
    }

    
}
