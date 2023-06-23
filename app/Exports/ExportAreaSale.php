<?php

namespace App\Exports;

use App\Models\AreaSale;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAreaSale implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreaSale::select('kode_toko','area_sale')->get();
    }
}
