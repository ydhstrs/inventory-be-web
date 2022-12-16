<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kota',
        'nama',
        'foto',
        'tahun',
        'jumlah',
        'keterangan',
    ];
}
