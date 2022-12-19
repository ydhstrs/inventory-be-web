<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Kota;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Inventaris;
use App\Models\Logistik;
use App\Models\Peralatan;

//Controller Untuk Get Data Kota dan Zona
class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInventaris(Request $request)
    {
        if ($request['id_kota'] == null) {

            $inventaris = Inventaris::select('id', 'id_tipe', 'id_kota', 'nama_inv', 'jmlh_inv', 'foto_inv', 'keterangan_inv')->with(['kota' => function ($query) {
                $query->select('id', 'nama_kota');
            }])->with(['tipe' => function ($query) {
                $query->select('id', 'nama_tipe', 'keterangan_tipe');
            }])
                ->get();

            return ResponseFormatter::success($inventaris, "Success Get Inventaris");
        } else {
            $inventaris = Inventaris::select('id', 'id_tipe', 'id_kota', 'nama_inv', 'jmlh_inv', 'foto_inv', 'keterangan_inv')->where('id_kota', $request->id_kota)->with(['kota' => function ($query) {
                $query->select('id', 'nama_kota');
            }])->with(['tipe' => function ($query) {
                $query->select('id', 'nama_tipe', 'keterangan_tipe');
            }])
                ->get();
        }
        return ResponseFormatter::success($inventaris, "Success Get Inventaris By Kota");
    }

    public function getPeralatan(Request $request)
    {
        if ($request['id_kota'] == null) {

            $inventaris = Peralatan::where('id_kota', $request['id_kota'])
                ->get();

            return ResponseFormatter::success($inventaris, "Success Get Peralatan");
        }else{
            $inventaris = Peralatan::all();

        return ResponseFormatter::success($inventaris, "Success Get Peralatan");
        }
    }


    public function getLogistik(Request $request)
    {
        if ($request['id_kota'] == null) {

            $inventaris = Logistik::where('id_kota', $request['id_kota'])
                ->get();

            return ResponseFormatter::success($inventaris, "Success Get Logistik");
        }else{
            $inventaris = Logistik::all();

        return ResponseFormatter::success($inventaris, "Success Get Logistik");
        }
    }
}
