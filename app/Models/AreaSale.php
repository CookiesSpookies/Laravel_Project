<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaSale extends Model
{
    use HasFactory;
    protected $fillable = ['kode_toko','area_sale'];
}
