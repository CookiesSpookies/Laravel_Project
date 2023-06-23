<?php

namespace App\Imports;

use App\Models\MasterSale;
use Maatwebsite\Excel\Concerns\ToModel;

class MasterSaleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterSale([
            'kode_sales' => $row[0],
            'nama_sales' => $row[1]
        ]);
    }
}
