<?php

namespace App\Imports;

use App\Models\AreaSale;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaSaleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AreaSale([
            'kode_toko' => $row[0],
            'area_sale' => $row[1]
        ]);
    }
}
