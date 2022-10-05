<?php

namespace App\Imports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMark implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mark([
            'note' => $row[0],
            'mark' => $row[1],
            
        ]);
    }
}
