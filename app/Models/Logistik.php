<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistik extends Model
{
    use HasFactory;
        protected $fillable = [
        'id_kota',
        'nama_logistik',
        'foto_logistik',
        'tahun_logistik',
        'kategori_logistik',
        'jumlah_logistik',
        'keterangan_logistik',
        'sumber_dana_logistik',
    ];

    public function kota(){
        return $this->belongsTo(Kota::class,'id_kota','id');
    }
}
