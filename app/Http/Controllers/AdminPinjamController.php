<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Kota;
use App\Http\Requests\StorePinjamRequest;
use App\Http\Requests\UpdatePinjamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PinjamExport;

class AdminPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribubsi = Pinjam::latest()->get();
        return view('admin.pinjam.index', [
            'distribusi' => $distribubsi,
        ]);
    }

    public function draft()
    {
        $distribubsi = Pinjam::create([
            'status' => 'draft',
        ]);

        return redirect()->route('pinjam.draftView', $distribubsi->id);
    }

    public function draftView($id)
    {
        $distribubsi = Pinjam::where('id', $id)->first();
        $kotas = Kota::all();
        return view('admin.pinjam.action.create', [
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePinjamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distribubsi = Pinjam::where('id', $id)->first();

        return view('admin.pinjam.show', [
            'distribusi' => $distribubsi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePinjamRequest  $request
     * @param  \App\Models\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam $admindistribusi)
    {
        $validatedData = $request->validate([
            'kota_penerima' => 'required|max:255',
            'status' => 'required|max:255',
            'tanggal_pinjam' => 'required',
            'tanggal_balik' => 'required',
            'keterangan_pinjam' => '',
        ]);
        if ($request->file('file') != null) {
            $ttd = $request->file('file')->store('peralatan');
            $image = asset('storage/' . $ttd);

            $request['file'] = $image;
        } else {
            $image = $request->file;
        }
        Pinjam::where('id', $request->id)->update([
            'kota_penerima' => $request->kota_penerima,
            'tanggal_balik' => $request->tanggal_balik,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keterangan_pinjam' => $request->keterangan_pinjam,
            'file' => $image,
            'status' =>  $request->status,
        ]);

        return redirect('adminpinjam')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $adminpinjam)
    {
        if ($adminpinjam->file) {
            Storage::delete($adminpinjam->file);
        }
        Pinjam::destroy($adminpinjam->id);

        return redirect('/adminpinjam')->with('success', 'Data Telah Dihapus');
    }
    public function export(Request $request)
    {
        return Excel::download(new PinjamExport(), 'peminjaman.xlsx');
    }
}
