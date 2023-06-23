<?php

namespace App\Imports;

use App\Models\History;
use Maatwebsite\Excel\Concerns\ToModel;

class HistoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new History([
            'kode_toko_baru' => $row[0],
            'kode_toko_lama' => $row[1]
        ]);
    }
}
