<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student_absence extends Model
{
    use HasFactory;

    public $table = 'student_absences';

    public $fillable =[
        'day',
        'cause',
        'justified',
        'student_id',
        'course_id',
    ];

    public $timestamps= true;
    
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
