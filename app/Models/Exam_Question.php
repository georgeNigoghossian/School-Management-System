<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Question_Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam_Question extends Model
{
    use HasFactory;

    public $table = 'exam__questions';

    public $timestamps = true;

    public $fillable=[
        'question',
        'mark',
        'exam_id',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function getBank(){
        return $this->belongsTo(Question_Bank::class);
    }

    public function answer(){
        return $this->hasMany(Exam_Answer::class);
    }
}
