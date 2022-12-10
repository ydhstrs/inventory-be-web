<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_inv',
        'id_tipe',
        'id_kota',
        'jmlh_inv',
        'foto_inv',
        'keterangan_inv'
    ];

    protected $casts = [
        'id_tipe'=>'integer',
        'id_kota'=>'integer',
    ];

    public function tipe(){
        return $this->belongsTo(Tipe_Inventaris::class, 'id_tipe','id');
    }
    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota','id');
    }
}
