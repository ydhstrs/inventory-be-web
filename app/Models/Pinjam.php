<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
        protected $fillable = [
        'kota_penerima',
        'file',
        'keterangan_pinjam',
        'status',
        'tanggal_pinjam',
        'tanggal_balik',
    ];

    public function distribusiItem(){
        return $this->hasMany(PinjamItem::class,'id_pinjam','id');
    }
}
