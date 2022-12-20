<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamItem extends Model
{
    use HasFactory;
    protected $fillable = ['id_pinjam', 'id_peralatan', 'jumlah'];

    public function pinjam()
    {
        return $this->belongsTo(Peralatan::class, 'id_peralatan', 'id');
    }
}
