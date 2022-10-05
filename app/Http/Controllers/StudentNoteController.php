<?php

namespace App\Http\Controllers;

use App\Models\Student_Note;
use App\Http\Requests\StoreStudent_NoteRequest;
use App\Http\Requests\UpdateStudent_NoteRequest;
use App\Models\StudentNoteReply;
use Illuminate\Http\Request;

class StudentNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Student_Note::all();
        return view('admin.additional.student_notes',compact('notes'));
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
     * @param  \App\Http\Requests\StoreStudent_NoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $student_id= $request->student_id;
        $reply = $request->reply;

        $reply = StudentNoteReply::create([
            'reply'=>$reply,
            'student_id'=>$student_id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_Note  $student_Note
     * @return \Illuminate\Http\Response
     */
    public function show(Student_Note $student_Note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_Note  $student_Note
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_Note $student_Note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudent_NoteRequest  $request
     * @param  \App\Models\Student_Note  $student_Note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent_NoteRequest $request, Student_Note $student_Note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_Note  $student_Note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Student_Note::find($id);
        $note->delete();

        return redirect()->back();
    }
}
