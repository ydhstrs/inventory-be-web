<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
        protected $fillable = 
        ['id_zona',
     'id_kota', 
     'id_jenis_bencana',
     'nama_kota',
     'kecamatan',
     'kelurahan',
     'alamat',
     'status_laporan',
     'foto_brg_keluar',
     'foto_brg_terima',
     'foto_brg_kembali',
     'tgl_laporan',
     'tgl_brg_keluar',
     'tgl_brg_terima',
     'tgl_brg_kembali',
    ];
        protected $casts = [
        'id_zona'=>'integer',
        'id_kota'=>'integer',
        'id_jenis_bencana'=>'integer',
    ];
}
