<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
        protected $fillable = [
        'nama_zona',
        'kode_zona',
    ];
    
}
