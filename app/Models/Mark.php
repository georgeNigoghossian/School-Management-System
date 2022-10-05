<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mark extends Model
{
    use HasFactory;

    public $table = 'marks';

    public $timestamps = true;

    public $fillable = [
        'note',
        'mark',
        'course_id',
        'homework_id',
        'exam_id',
        'student_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function homework(){
        return $this->belongsTo(Homework::class,'homework_id');
    }
}
