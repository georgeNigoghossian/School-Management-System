<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin_Note;

class Admin extends Model
{
    use HasFactory;

    public $table = 'admins';

    public $fillable = [
    'full_name',
    'password',
    'email',
    'phone',
    ];

    public $timestamps = true;

    public function admin_comments(){
        return $this->hasMany(Admin_Note::class);
    }
}
