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
        'kategori',
        'keterangan',
        'sumber_dana_peralatan',
    ];

    public function kondisiBarang(){
        return $this->belongsTo(Kondisi::class,'id','id_barang');
    }

    public function kota(){
        return $this->belongsTo(Kota::class,'id_kota','id');
    }
}
