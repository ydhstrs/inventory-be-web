<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe_Inventaris extends Model
{
    use HasFactory;
       protected $table = 'tipe_inventaris';
        protected $fillable = [
        'nama_tipe',
        'keterangan_tipe',
    ];

}
