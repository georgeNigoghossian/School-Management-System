<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student_Answer extends Model
{
    use HasFactory;

    public $table = 'student_answers';

    public $fillable =[
        'answer',
        'exam_id',
        'student_id',
        'question_id',
    ];

    public $timestamps = true;

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function question(){
        return $this->belongsTo(Exam_Question::class);
    }

}
