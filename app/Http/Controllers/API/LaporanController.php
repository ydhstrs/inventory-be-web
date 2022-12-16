<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaporanStoreRequest;
use App\Models\Laporan;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\PivotLaporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $home = Laporan::all();

        return response()->json([
          'home' => $home  
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Post\StorePostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LaporanStoreRequest $request)
    {
        try {

            $laporan = new Laporan;

            $laporan->id_zona = $request->get('id_zona');
            $laporan->id_kota = $request->get('id_kota');
            $laporan->id_jenis_bencana = $request->get('id_jenis_bencana');
            $laporan->nama_kota = $request->get('nama_kota');
            $laporan->kecamatan = $request->get('kecamatan');
            $laporan->kelurahan = $request->get('kelurahan');
            $laporan->alamat = $request->get('alamat');
            $laporan->tgl_laporan = $request->get('tgl_laporan');

            $laporan->save();

              $pivotlaporan = new PivotLaporan;
            
            $pivotlaporan->id_laporan = $laporan->id;
            $pivotlaporan->id_inventaris = $request->get('id_inventaris');
            $pivotlaporan->jmlh_dipakai = $request->get('jmlh_dipakai');
            $pivotlaporan->status_brg = 0;

            $pivotlaporan->save();

            return ResponseFormatter::success(['laporan' => $laporan,'barang'=> $pivotlaporan], "New Laporan Has Been Created",200 );
        } catch (\Exception $e) {

            return response()->json(['error' => 'Something went wrong? Please try again.' . $e->getMessage()], 400);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Post\UpdatePostRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    // public function update(Store $request, $id)
    // {
    //     try {
    //         $home = Home::findOrFail($id);
    // if ($request->file('image')->isValid()) {
    //         $file = $request->file('image') ;
    //         $fileName = $file->getClientOriginalName() ;
    //         $destinationPath = 'images/posts/' ;
    //         $file->move($destinationPath,$fileName);
    //         $home->image = $fileName;
    //     }
    //         $home->name = $request->name;
    //         $home->description = $request->description;
    //         $home->address = $request->address;
    //         $home->contact = $request->contact;

    //         $home->save();

    //         return response()->json('Success' . $id . ' was updated!', 200);
    //     } catch (\Exception $e) {

    //         return response()->json(['error' => 'Something went wrong? Please try again.' . $e->getMessage()], 400);
    //     }
    // }
}
