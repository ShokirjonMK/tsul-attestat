<?php

namespace App\Imports;

use App\Models\Mk\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $deprtment_id =  session('department_id');
        if(isset($row['question']) && isset( $row['type'])){
            return new Question([
                'question' => ($row['question']) ,
                'department_id' => $deprtment_id,
                'type' => $row['type'],
            ]);
        }else{
            session()->put('excel_failed',1);
        }

    }
}
