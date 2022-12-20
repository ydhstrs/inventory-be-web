<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(){
        $banners = Banner::all();
        return view('admin.banner.index',['banners'=>$banners]);
    }

    public function store(Request $request){
        if ($request->file('file') != null) {
            $ttd = $request->file('file')->store('peralatan');
            $image = asset('storage/' . $ttd);

            $request['foto_banner'] = $image;
        }

        Banner::create($request->all());

        return redirect()->route('banner.index')->with('success', 'Data berhasil ditambah');
    }

    public function delete($id){

        Banner::where(['id' => $id])->delete();
        return redirect()->route('banner.index')->with('success', 'Data berhasil dihapus');
    }
    
}
