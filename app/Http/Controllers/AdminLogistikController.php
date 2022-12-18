<?php

namespace App\Http\Controllers;

use App\Models\Logistik;
use App\Http\Requests\StoreLogistikRequest;
use App\Http\Requests\UpdateLogistikRequest;
use App\Models\KategoriL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminLogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_kota = Auth::user()->id_kota;
        $logistiks = [];
        if (Auth::user()->role==2){
        $logistiks = Logistik::all();
        }
        else{
        $logistiks = Logistik::where('id_kota', $id_kota)->get();
    }
        
        return view('admin.logistik.index', ['logistiks' => $logistiks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = KategoriL::all();

        return view('admin.logistik.create', [
            'kategories' => $kategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogistikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kota' => 'required|max:11',
            'nama_logistik' => 'required|max:255',
            'foto_logistik' => 'image|file|max:1024',
            'tahun_logistik' => '',
            'kategori_logistik' => 'required|max:255',
            'jumlah_logistik' => 'required|max:11',
            'keterangan_logistik' => 'max:255',
        ]);

        if ($request->file('foto_logistik')) {
            $validatedData['foto_logistik'] = $request->file('foto_logistik')->store('logistik');
        }

        Logistik::create($validatedData);

        return redirect('/adminlogistik')->with('success', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function show(Logistik $adminlogistik)
    {
        $id_kota = Auth::user()->id_kota;
        return view('admin.logistik.show', ['logistik' => $adminlogistik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistik $adminlogistik)
    {
        $kategories = KategoriL::all();
        return view('admin.logistik.edit', ['logistik' => $adminlogistik,
    'kategories' => $kategories
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogistikRequest  $request
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogistikRequest $request, Logistik $logistik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistik $adminlogistik)
    {
        if ($adminlogistik->foto_logistik) {
            Storage::delete($adminlogistik->foto_logistik);
        }
        Logistik::destroy($adminlogistik->id);

        return redirect('/adminlogistik')->with('success', 'Data Telah Dihapus');
    }

}
