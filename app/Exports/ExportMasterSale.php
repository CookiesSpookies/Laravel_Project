<?php

namespace App\Exports;

use App\Models\MasterSale;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMasterSale implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterSale::select('kode_sales','nama_sales')->get();
    }
}
