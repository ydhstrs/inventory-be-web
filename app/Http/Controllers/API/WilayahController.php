<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Kota;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

//Controller Untuk Get Data Kota dan Zona
class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getZona(Request $request)
    {
        $zonas = Zona::select('id', 'nama_zona', 'kode_zona')->get();

        return ResponseFormatter::success([
          'zonas' => $zonas
          
        ], "Success Get Zona" );
        
    }
    public function getKota(Request $request)
    {
        $kotas = Kota::select('id','id_zona', 'nama_kota', 'kode_kota')->get();

        return ResponseFormatter::success([
          'kotas' => $kotas
          
        ], "Success Get Kota" );
        
    }

    
}
