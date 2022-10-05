<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Mark;
use App\Models\parents;
use App\Models\Homework;
use App\Models\Student_Note;
use App\Models\student_absence;
use App\Models\Student_Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;

class Student extends Model 
{
    use HasFactory;
    use Authenticatable;


    public $table='students';

    public $fillable = [
        'registration_number',
        'first_name',
        'last_name',
        'address',
        'phone',
        'home_phone',
        'gender',
        'email',
        'image',
        'birthdate',
        'password',
        'classroom_id',
    ];
    
        
    public $timestamps = true;

    public function getHomework(){
        return $this->belongsToMany(Homework::class);
    }
    public function mark(){
        return $this->belongsToMany(Mark::class);
    }
    public function getExam(){
        return $this->hasMany(Exam::class);
    }
    public function notes(){
        return $this->hasMany(Student_Note::class);
    }
    public function payments(){
        return $this->hasMany(Student_Payment::class);
    }
    public function absences(){
        return $this->hasMany(student_absence::class);
    }   
    public function getParent(){
        return $this->belongsToMany(parents::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    public function exam_anwers(){
        return $this->hasMany(Exam_Answer::class);
    }
    public function active_homework(){
        return $this->belongsToMany(Homework::class,"active_homeworks")->withPivot('student_id');
    }
    public function active_exams(){
        return $this->belongsToMany(Exam::class,"active_exams")->withPivot('student_id');
    }
    public function homework_answer(){
        return $this->hasOne(Homework_Answer::class);
    }
}
