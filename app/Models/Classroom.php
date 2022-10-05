<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    public $table = 'classrooms';

    public $fillable = [
        'classroom_name',
        'number_of_students',
        'installment',
    ];

    public $timestamps = true;

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function course(){
        return $this->belongsToMany(Course::class,'clasroom_courses');
    }
    public function teacher(){
        return $this->belongsToMany(Teacher::class,'classroom_teacher');
    }
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
