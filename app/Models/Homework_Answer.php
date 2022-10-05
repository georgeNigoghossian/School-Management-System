<?php

namespace App\Models;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework_Answer extends Model
{
    use HasFactory;

    public $table = 'homework__answers';

    public $fillable = [
        'file',
        'homework_id',
        'student_id',
    ];

    public $timestamps=true;

    
    public function homework(){
        return $this->belongsTo(Homework::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
