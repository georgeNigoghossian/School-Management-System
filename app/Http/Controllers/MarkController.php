<?php

namespace App\Http\Controllers;

use App\Exports\ExportExamMark;
use App\Models\Mark;
use App\Exports\ExportMark;
use App\Imports\ImportMark;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;

class MarkController extends Controller
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
     * @param  \App\Http\Requests\StoreMarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark = Mark::query()->create([
            'note'=>$request->note,
            'mark'=>$request->mark,
            'student_id'=>$request->student_id,
            'homework_id'=>$request->homework_id,
            'course_id'=>$request->course_id, 
            'exam_id'=>$request->exam_id, 
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkRequest  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkRequest $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        //
    }

    public function exportHWMarks(Request $request){
        return Excel::download(new ExportMark, 'homwork_marks.xlsx');
    }

    public function exportExamMarks(Request $request){
        return Excel::download(new ExportExamMark, 'exam_marks.xlsx');
    }
}
