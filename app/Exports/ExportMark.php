<?php

namespace App\Exports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ExportMark implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Student Name',
            'Mark',
            'Homework Name',
            'Note' ,
             
        ];
    } 

    public function collection()
    {
        //return Mark::all()->makeHidden(['id','course_id']);
  
        return Mark::select(
            "students.first_name as first_name",
            "marks.mark",
            "homework.title as homework_name",
            "marks.note", 
            
        )
        ->join("students", "students.id", "=", "marks.student_id")
        ->join("homework", "homework.id", "=", "marks.homework_id") 
        ->get();

    }
}
