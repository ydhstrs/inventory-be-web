<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_zona',
        'nama_kota',
        'kode_kota',
    ];

    protected $casts = [
        'id_zona'=>'integer',
    ];

        public function zona(){
        return $this->belongsTo(Zona::class, 'id_zona','id');
    }
}
