<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Student_Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() 
    {
        
        //$this->middleware('auth');
    
        // Fetch the Site Settings object
        $notes=Student_Note::all();
        $count=$notes->count();
        View::share('notes_count', $count);
  
        

    }


}
