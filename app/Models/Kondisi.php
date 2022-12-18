<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'baik',
        'rusak_ringan',
        'rusak_sedang',
        'rusak_berat',
    ];
}
