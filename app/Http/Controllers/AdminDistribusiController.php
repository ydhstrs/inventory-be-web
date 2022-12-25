<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistribusiExport;
use App\Models\DistribusiItem;
use App\Models\Logistik;

class AdminDistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribubsi = Distribusi::all();
        return view('admin.distribusi.index', [
            'distribusi' => $distribubsi,
        ]);
    }

    public function draft()
    {
        $distribubsi = Distribusi::create([
            'status' => 'draft',
        ]);

        return redirect()->route('distribusi.draftView', $distribubsi->id);
    }

    public function draftView($id)
    {
        $distribubsi = Distribusi::where('id', $id)->first();
        $kotas = Kota::all();
        return view('admin.distribusi.action.create', [
            'distribusi' => $distribubsi,
            'kotas' => $kotas,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function addToVerif(Request $request, $id)
    {
        $distribubsi = Distribusi::where('id', $id)->first();
        $jumlah =  DistribusiItem::where('id', $request['id'])->sum('jumlah');
        $logistik =  Logistik::where('id', $request->id_logistik)->sum('jumlah_logistik');
        $total = $logistik - $jumlah;
        DistribusiItem::where('id', $request['id'])->update([
            'status' => 1,
        ]);
        Logistik::where('id', $request->id_logistik)->update([
            'jumlah_logistik' => $total,
        ]);
        return redirect()->route('distribusi.draftView', $distribubsi->id);
    }

    public function delToVerif(Request $request, $id)
    {
        $distribubsi = Distribusi::where('id', $id)->first();
        $jumlah =  DistribusiItem::where('id', $request['id'])->sum('jumlah');
        $logistik =  Logistik::where('id', $request->id_logistik)->sum('jumlah_logistik');
        $total = $logistik + $jumlah;
        DistribusiItem::where('id', $request['id'])->update([
            'status' => 0,
        ]);
        Logistik::where('id', $request->id_logistik)->update([
            'jumlah_logistik' => $total,
        ]);

        return redirect()->route('distribusi.draftView', $distribubsi->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distribubsi = Distribusi::where('id', $id)->first();

        return view('admin.distribusi.show', [
            'distribusi' => $distribubsi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribusi $admindistribusi)
    {
        $validatedData = $request->validate([
            'kota_penerima' => 'required|max:255',
            'status' => 'required|max:255',
            'tanggal_distribusi' => 'required',
            'keterangan_distribusi' => '',
        ]);
        if ($request->file('file') != null) {
            $ttd = $request->file('file')->store('peralatan');
            $image = asset('storage/' . $ttd);

            $request['file'] = $image;
        } else {
            $image = $request->file;
        }
        Distribusi::where('id', $request->id)->update([
            'kota_penerima' => $request->kota_penerima,
            'tanggal_distribusi' => $request->tanggal_distribusi,
            'keterangan_distribusi' => $request->keterangan_distribusi,
            'file' => $image,
            'status' =>  $request->status,
        ]);

        return redirect('admindistribusi')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribusi $admindistribusi)
    {
        if ($admindistribusi->file) {
            Storage::delete($admindistribusi->file);
        }
        Distribusi::destroy($admindistribusi->id);

        return redirect('/admindistribusi')->with('success', 'Data Telah Dihapus');
    }
    public function export(Request $request)
    {
        return Excel::download(new DistribusiExport(), 'distribusi.xlsx');
    }
}
