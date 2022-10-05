<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin.class.list',compact("classrooms"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.add_class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'classroom_name'=>'required',
            'number_of_students'=>'required',
            'installment'=>'required',
        ]);

        $classroom = Classroom::query()->create([
            'classroom_name'=>$request->classroom_name,
            'number_of_students'=>$request->number_of_students,
            'installment'=>$request->installment,
        ]);

        $classroom->save();
        return redirect()->route('classroom.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassroomRequest  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        $validated = $request->validate([
            'classroom_name'=>'required',
            'number_of_students'=>'required',
            'installment'=>'required',
        ]);

        $classroom->classroom_name=$request->classroom_name;
        $classroom->number_of_students=$request->number_of_students;

        $classroom->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();

        return redirect()->back();

    }
}
