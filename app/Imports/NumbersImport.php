<?php

namespace App\Imports;

use App\Models\TappSentMsg;
use Maatwebsite\Excel\Concerns\ToModel;

class NumbersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TappSentMsg([
            'sms_number'     => $row[0],
        ]);
    }
}
