<?php

namespace App\Http\Controllers;

use App\Models\Logistik;
use App\Models\Kota;
use App\Http\Requests\StoreLogistikRequest;
use App\Http\Requests\UpdateLogistikRequest;
use App\Models\KategoriL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\LogistikExport;
use Maatwebsite\Excel\Facades\Excel;

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
        if (Auth::user()->role == 2) {
            $logistiks = Logistik::all();
        } else {
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
            'fotologistik' => 'image|file|max:1024',
            'tahun_logistik' => '',
            'kategori_logistik' => 'required|max:255',
            'jumlah_logistik' => 'required|max:11',
            'keterangan_logistik' => 'max:255',
        ]);


        if ($request->file('fotologistik') != null) {
            $ttd = $request->file('fotologistik')->store("peralatan");
            $image = asset('storage/' . $ttd);

            $request['foto_logistik'] = $image;
        }

        Logistik::create($request->all());

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
        return view('admin.logistik.edit', ['logistik' => $adminlogistik, 'kategories' => $kategories]);
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
    public function export(Request $request)
    {
        $myId = Auth::user()->id_kota;
        $namaKota = Kota::where('id',  $myId)->get('nama_kota');
        return Excel::download(new LogistikExport($myId, $namaKota), 'logistik.xlsx');
    }
}
