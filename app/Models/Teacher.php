<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;

class Teacher extends Model
{
    use Authenticatable;
    use HasFactory;

    public $table='teachers';

    public $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'gender',
        'email',
        'image',
        'birthdate',
        'experience',
        'password',
        'course_id'
    ];

    public $timestamps = true;

    public function classroom(){
        return $this->belongsToMany(Classroom::class,"classroom_teacher")->withPivot('teacher_id');
    }
    public function course(){
        return $this->belongsToMany(Course::class,"teacher_course")->withPivot('teacher_id');
    }
    
    
}
