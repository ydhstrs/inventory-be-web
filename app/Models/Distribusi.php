<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'keterangan',
        'file',
        'tujuan',
        'status',
        'tgl_peminjaman',
        'tgl_pengembalian',
    ];

    public function distribusiItem(){
        return $this->hasMany(DistribusiItem::class,'id_distribusi','id');
    }
}
