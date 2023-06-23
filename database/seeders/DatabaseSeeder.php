<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AreaSale;
use App\Models\History;
use App\Models\MasterSale;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // HISTORY
        History::create([
            'kode_toko_baru' => 1,
            'kode_toko_lama' => 6
        ]);
        History::create([
            'kode_toko_baru' => 2
        ]);
        History::create([
            'kode_toko_baru' => 3,
            'kode_toko_lama' => 7
        ]);
        History::create([
            'kode_toko_baru' => 4,
            'kode_toko_lama' => 9
        ]);
        History::create([
            'kode_toko_baru' => 5,
            'kode_toko_lama' => 8
        ]);

        // TRANSACTION
        Transaction::create([
            'kode_toko' => 1,
            'nominal_transaksi' => 1000.00
        ]);
        Transaction::create([
            'kode_toko' => 2,
            'nominal_transaksi' => 1000.00
        ]);
        Transaction::create([
            'kode_toko' => 4,
            'nominal_transaksi' => 1000.00
        ]);
        Transaction::create([
            'kode_toko' => 6,
            'nominal_transaksi' => 1000.00
        ]);
        Transaction::create([
            'kode_toko' => 7,
            'nominal_transaksi' => 1000.00
        ]);

        // AREA SALES
        AreaSale::create([
            'kode_toko' => 1,
            'area_sale' => 'A'
        ]);
        AreaSale::create([
            'kode_toko' => 2,
            'area_sale' => 'A'
        ]);
        AreaSale::create([
            'kode_toko' => 3,
            'area_sale' => 'A'
        ]);
        AreaSale::create([
            'kode_toko' => 4,
            'area_sale' => 'B'
        ]);
        AreaSale::create([
            'kode_toko' => 5,
            'area_sale' => 'B'
        ]);

        // MASTER SALES
        MasterSale::create([
            'kode_sales' => 'A1',
            'nama_sales' => 'Alpha'
        ]);
        MasterSale::create([
            'kode_sales' => 'A2',
            'nama_sales' => 'Blue'
        ]);
        MasterSale::create([
            'kode_sales' => 'A3',
            'nama_sales' => 'Charlie'
        ]);
        MasterSale::create([
            'kode_sales' => 'B1',
            'nama_sales' => 'Delta'
        ]);
        MasterSale::create([
            'kode_sales' => 'B2',
            'nama_sales' => 'Echo'
        ]);
    }
}
