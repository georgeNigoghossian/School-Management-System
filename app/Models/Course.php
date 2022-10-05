<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Mark;
use App\Models\Homework;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    
    public $table='courses';

    public $fillable = [
        'name',
        'file',
    ];

    public $timestamps=true;

    public function classroom(){
        return $this->belongsToMany(Classroom::class,'clasroom_courses');
    }

    public function getHomework(){
        return $this->belongsToMany(Homework::class);
    }
    public function mark(){
        return $this->hasMany(Mark::class);
    }
    public function exam(){
        return $this->hasMany(Exam::class);
    }

    public function teacher(){
        return $this->belongsToMany(Teacher::class,"teacher_course");
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
    
}
