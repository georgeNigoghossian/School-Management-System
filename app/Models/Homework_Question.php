<?php

namespace App\Models;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework_Question extends Model
{
    use HasFactory;

    public $table = 'homework__questions';

    public $fillable =[
        'question',
    ];

    public $timestamps =  true;

    public function getHomework(){
        return $this->belongsTo(Homework::class);
    }

}
