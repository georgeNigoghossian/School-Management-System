<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class parents extends Model
{
    use HasFactory;

    public $table='parents';

    public $fillable = [
        'full_name',
        'password',
        'email',
        'phone',
    ];
    public $timestamps = true;

    public function getStudent(){
        return $this->belongsToMany(Student::class);
    }
    
}
