<?php

namespace App\Http\Controllers;

use App\Models\KategoriL;
use Illuminate\Http\Request;

class AdminKategorilController extends Controller
{
    public function index(){
        $kategoris = KategoriL::all();
        return view('admin.kategoril.index',['kategorils'=>$kategoris]);
    }

    public function store(Request $request){
        KategoriL::create($request->except($request['_token']));

        return redirect()->route('kategoril.index')->with('success', 'Data berhasil ditambah');
    }

    public function delete($id){

        KategoriL::where(['id' => $id])->delete();
        return redirect()->route('kategoril.index')->with('success', 'Data berhasil dihapus');
    }
    
}
