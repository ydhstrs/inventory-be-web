<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $kategoris = Category::all();
        return view('admin.kategori.index',['kategoris'=>$kategoris]);
    }

    public function store(Request $request){
        Category::create($request->except($request['_token']));

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambah');
    }

    public function delete($id){

        Category::where(['id' => $id])->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
