<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student_Payment extends Model
{
    use HasFactory;

    public $table = 'student__payments';

    public $fillable =[
        'total_payments',
        'current_payments',
        'date',
        'student_id'
    ];

    public $timestamps= true;
    
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
