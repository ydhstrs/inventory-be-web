<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotLaporan extends Model
{
    use HasFactory;
    protected $fillable = ['id_laporan', 'id_inventaris', 'jmlh_dipakai', 'status_brg'];
    protected $casts = [
        'id_laporan' => 'integer',
        'id_inventaris' => 'integer',
        'jmlh_dipakai' => 'integer',
        'status_brg' => 'integer',
    ];
    public function laporan()
    {
        return $this->belongsTo(ChargeType::class, 'id_laporan', 'id');
    }

    public function inventaris()
    {
        return $this->belongsTo(Book::class, 'id_inventaris', 'id');
    }
}
