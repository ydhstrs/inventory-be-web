<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_zona' => 'required|integer|max:11',
            'id_kota' => 'required|integer|max:11',
            'id_jenis_bencana' => 'required|integer|max:11',
            'nama_kota' => 'required|string|min:3|max:100',
            'kecamatan' => 'required|string|min:3|max:100',
            'kelurahan' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:200',
            // 'foto_brg_keluar' => 'required|string|min:3|max:240',
            // 'foto_brg_terima' => 'required|string|min:3|max:240',
            // 'foto_brg_kembali' => 'required|string|min:3|max:240',
            'tgl_laporan' => 'required|date',
            // 'tgl_brg_keluar' => 'required|date',
            // 'tgl_brg_terima' => 'required|date',
            // 'tgl_brg_kembali' => 'required|date',
        ];
    }
}
