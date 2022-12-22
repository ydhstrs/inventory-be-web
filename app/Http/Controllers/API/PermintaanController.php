<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Permintaan;
use App\Models\PermintaanBarang;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function getAllPermintaan(Request $request)
    {
        if ($request['id_user'] != null) {

            $permintaan = Permintaan::where('id_user', $request['id_user'])->with('permintaanBarang')
                ->get();

            return ResponseFormatter::success($permintaan, "Success Get Permintaan");
        } else {
            $permintaan = Permintaan::with('permintaanBarang')->get();

            return ResponseFormatter::success($permintaan, "Success Get Permintaan");
        }
    }

    public function storePermintaan(Request $request)
    {
        $request->validate([
            'kabupaten' => 'required|string|max:200',
            'kecamatan' => 'required|string|max:200',
            'kelurahan' => 'required|string|max:200',
            'alamat' => 'required|string|max:200',
            'jenis_bencana' => 'required|string|max:200',
            'id_user' => 'required|integer|max:200',
        ]);

        try {

            $barangs = $request->get('barangs');
            $barangsDecode = json_decode($barangs);

            $permintaan = new Permintaan();

            $permintaan->kabupaten = $request->get('kabupaten');
            $permintaan->kecamatan = $request->get('kecamatan');
            $permintaan->kelurahan = $request->get('kelurahan');
            $permintaan->alamat = $request->get('alamat');
            $permintaan->jenis_bencana = $request->get('jenis_bencana');
            $permintaan->id_user = $request->get('id_user');
            
            $permintaan->save();


           
            for($i=0;$i<count($barangsDecode);$i++){
                PermintaanBarang::create([
                    'id_permintaan'=>$permintaan->id,
                    'nama_permintaan_barang'=>$barangsDecode[$i]->nama,
                    'jumlah_permintaan_barang'=>$barangsDecode[$i]->jumlah,
                   ]);
            }

            return ResponseFormatter::success($permintaan, "Permintaan Telah Dibuat", 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Something went wrong? Please try again.' . $e->getMessage()], 400);
        }
    }
}
