<?php

namespace App\Models;

use App\Models\Mark;
use App\Models\Course;
use App\Models\Student;
use App\Models\Exam_Answer;
use App\Models\Exam_Question;
use App\Models\Student_Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    public $table = 'exams';

    public $fillable = [
        'name',
        'number_of_questions',
        'exam_date',
        'exam_duration',
        'course_id',
        'total_mark',
        'exam_time',
        'exam_type',
        'active',
    ];

    public $timestamps = true;

    public function question(){
        return $this->hasMany(Exam_Question::class);
    }
    public function answer(){
        return $this->hasMany(Exam_Answer::class);
    }
    public function mark(){
        return $this->hasMany(Mark::class);
    }
    public function student(){
        return $this->belongsToMany(Student::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function student_answer(){
        return $this->hasMany(Student_Answer::class);
    }
    public function active_student(){
        return $this->belongsToMany(Student::class,"active_exams")->withPivot('exam_id');
    }
}
