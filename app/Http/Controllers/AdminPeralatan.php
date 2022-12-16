<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPeralatan extends Controller
{

    public function index()
    {
        $id_kota = Auth::user()->id_kota;
        $peralatans = Peralatan::where('id_kota',$id_kota)->get();
        return view('admin.peralatan.index',['peralatans'=>$peralatans]);
    }

    public function addView(){
        return view('admin.peralatan.create');
    }

    public function store(Request $request){

        if ($request->file('filefoto') != null) {
            $ttd = $request->file('filefoto')->store("peralatan");
            $image = asset('storage/' . $ttd);

            $request['foto'] = $image;
        }

        $request['id_kota'] = Auth::user()->id_kota;
        Peralatan::create($request->all());
        return redirect()->route('peralatan.index')->with('success', 'Data berhasil ditambah');
    }

}
