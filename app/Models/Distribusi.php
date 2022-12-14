<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kota_penerima',
        'file',
        'keterangan_distribusi',
        'status',
        'tanggal_distribusi',
    ];

    public function distribusiItem(){
        return $this->hasMany(DistribusiItem::class,'id_distribusi','id');
    }
}
