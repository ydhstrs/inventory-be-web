<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPeralatan extends Controller
{

    public function index()
    {
        $id_kota = Auth::user()->id_kota;
        $peralatans = Peralatan::where('id_kota', $id_kota)->get();
        return view('admin.peralatan.index', ['peralatans' => $peralatans]);
    }

    public function addView()
    {
        return view('admin.peralatan.create');
    }

    public function detailView($id)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::where(['id_kota' => $id_kota, 'id' => $id])->first();
        return view('admin.peralatan.show',['peralatan'=>$peralatan]);
    }

    public function store(Request $request)
    {

        if ($request->file('filefoto') != null) {
            $ttd = $request->file('filefoto')->store("peralatan");
            $image = asset('storage/' . $ttd);

            $request['foto'] = $image;
        }

        $request['id_kota'] = Auth::user()->id_kota;
        Peralatan::create($request->all());
        return redirect()->route('peralatan.index')->with('success', 'Data berhasil ditambah');
    }

    public function editView($id)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::where(['id_kota' => $id_kota, 'id' => $id])->first();
        return view('admin.peralatan.edit', ['peralatan' => $peralatan]);
    }

    public function update(Request $request)
    {

        if ($request->file('filefoto') != null) {
            $ttd = $request->file('filefoto')->store("peralatan");
            $image = asset('storage/' . $ttd);

            $request['foto'] = $image;
        }


        Peralatan::where(['id' => $request['id']])->update($request->except('_token'));

        return redirect()->route('peralatan.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $peralatan = Peralatan::where(['id' => $id])->first();
        if ($peralatan->foto != null) {
            Storage::delete($peralatan->foto);
        }
        Peralatan::where(['id' => $id])->delete();
        return redirect()->route('peralatan.index')->with('success', 'Data berhasil dihapus');
    }
}
