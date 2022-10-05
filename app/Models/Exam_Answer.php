<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam_Answer extends Model
{
    use HasFactory;

    public $table = 'exam__answers';

    public $timestamps = true;

    public $fillable=[
        'answer1', 
        'answer2', 
        'answer3', 
        'answer4', 
        'correct_answer',
        'exam_id',
        'question_id',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function question(){
        return $this->belongsTo(Exam_Question::class);
    }
}
