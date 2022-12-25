<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_distribusi',
        'id_logistik',
        'jumlah',
        'status',
    ];

    public function logistik()
    {
        return $this->belongsTo(Logistik::class, 'id_logistik', 'id');
    }
}
