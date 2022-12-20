<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_permintaan',
        'nama_permintaan_barang',
        'jumlah_permintaan_barang',
    ];
}
