<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Student_Payment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students_count= Student::all()->count();
        $teachers_count = Teacher::all()->count();
        $courses_count = Course::all()->count();
        $classes_count = Classroom::all()->count();

        $males = Student::where('gender','male')->count();
        $females = Student::where('gender','female')->count();

        
        $earnings = Student_Payment::groupBy(DB::raw("YEAR(date) "))->selectRaw('sum(current_payments) as sum , YEAR(date) as year')->get();
        //dd($earnings);
        return view('admin.dashboard',compact('students_count','teachers_count','courses_count',
        'classes_count','males','females','earnings'));
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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
