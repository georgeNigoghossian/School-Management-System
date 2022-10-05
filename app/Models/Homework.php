<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\Homework_Answer;
use App\Models\Homework_Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework extends Model
{
    use HasFactory;

    public $table = 'homework';

    public $fillable = [
        'title',
        'homework_date',
        'course_id',
    ];

    public $timestamps = true;

    public function getCourse(){
        return $this->belongsToMany(Course::class);
    } 
    
    public function getStudent(){
        return $this->belongsToMany(Student::class);
    }

    public function getAnswer(){
        return $this->hasMany(Homework_Answer::class);
    }
    public function getQuestion(){
        return $this->hasMany(Homework_Question::class);
    }
    public function active_student(){
        return $this->belongsToMany(Student::class,"active_homeworks")->withPivot('homework_id');
    }
    public function mark(){
        return $this->hasOne(Mark::class);
    }
    
}
