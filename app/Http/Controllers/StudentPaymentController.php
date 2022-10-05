<?php

namespace App\Http\Controllers;

use App\Models\Student_Payment;
use App\Http\Requests\StoreStudent_PaymentRequest;
use App\Http\Requests\UpdateStudent_PaymentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Student_Payment::groupBy('student_id')
        ->selectRaw('sum(current_payments) as sum, student_id,total_payments')
        ->get();
            // dd($payments);
        return view('admin.payment.student_list',compact("payments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.payment.student_update',compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudent_PaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student)
    {

        
        $payment = Student_Payment::query()->create([
            'total_payments'=>$student->classroom->installment,
            'current_payments'=>0,
            'student_id'=>$student->id,
            'date'=>date('Y-m-d'),
        ]);

        $payment->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_Payment  $student_Payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_payments = Student_Payment::where('student_id',$id)->get();
         //dd($student_payments);
        return view('admin.payment.details',compact("student_payments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_Payment  $student_Payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_Payment $student_Payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudent_PaymentRequest  $request
     * @param  \App\Models\Student_Payment  $student_Payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student_payment = Student_Payment::where('student_id',$id)->first();
      
        $current_student_payments = DB::table('student__payments')->where('student_id',$id)->sum('current_payments');
        if($current_student_payments+$request->amount > $student_payment->total_payments){
            return view('admin.payment.error');
        }
         
        $validated = $request->validate([
            'amount'=>'required',
            'date'=>'required',
        ]);

        $payment = Student_Payment::query()->create([
            'total_payments'=>$student_payment->total_payments,
            'current_payments'=>$request->amount,
            'date'=>$request->date,
            'student_id'=>$id,
        ]);

        $payment->save();
        return redirect()->route('student.payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_Payment  $student_Payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_Payment $student_Payment)
    {
        //
    }
}
