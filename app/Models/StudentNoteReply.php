<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentNoteReply extends Model
{
    use HasFactory;

    public $table = 'student__notes_replies';

    public $fillable =[
        'reply',
        'student_id'
    ];

    public $timestamps= true;
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
