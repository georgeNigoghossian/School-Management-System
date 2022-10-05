<?php

namespace App\Exports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ExportExamMark implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Student Name',
            'Mark',
            'Note' ,
            'Exam Name', 
        ];
    } 

    public function collection()
    {
        //return Mark::all()->makeHidden(['id','course_id']);
  
        return Mark::select(
            "students.first_name as first_name",
            "marks.mark",
            "marks.note", 
            "exams.name as exam_name",
          
            
        )
        ->join("students", "students.id", "=", "marks.student_id")
        ->join("exams", "exams.id", "=", "marks.exam_id") 
        ->get();

    }
}
