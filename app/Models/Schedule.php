<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    public $table = 'schedule';

    public $fillable = [
        'time',
        'day',
        'course_id',
        'classroom_id',
    ];

    public $timestamps = true;

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    
}
