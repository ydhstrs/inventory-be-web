<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'jenis_bencana',
    ];

    public function permintaanBarang(){
        return $this->hasMany(PermintaanBarang::class,'id_permintaan','id');
    }
}