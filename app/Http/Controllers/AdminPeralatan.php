<?php

namespace App\Http\Controllers;

use App\Exports\PeralatanExport;
use App\Models\Category;
use App\Models\Kota;
use App\Models\Inventaris;
use App\Models\Kondisi;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class AdminPeralatan extends Controller
{
    public function index()
    {
        $peralatans = [];
        if (Auth::user()->role == 2) {
            $peralatans = Peralatan::all();
        } else {
            $id_kota = Auth::user()->id_kota;
            $peralatans = Peralatan::where('id_kota', $id_kota)->get();
        }
        return view('admin.peralatan.index', ['peralatans' => $peralatans]);
    }

    public function addView()
    {
        $kategories = Category::all();
        return view('admin.peralatan.create', [
            'kategories' => $kategories,
        ]);
    }

    public function detailView($id)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::where(['id_kota' => $id_kota, 'id' => $id])->first();
        return view('admin.peralatan.show', ['peralatan' => $peralatan]);
    }

    public function store(Request $request)
    {
        if ($request->file('filefoto')) {
            $request['foto'] = $request->file('filefoto')->store('peralatan');
        }

        $request['id_kota'] = Auth::user()->id_kota;

        $peralatan = Peralatan::create($request->all());
        Kondisi::create([
            'id_barang' => $peralatan->id,
            'baik' => $request['baik'],
            'rusak_ringan' => $request['rusak_ringan'],
            'rusak_sedang' => $request['rusak_sedang'],
            'rusak_berat' => $request['rusak_berat'],
        ]);
        return redirect()
            ->route('peralatan.index')
            ->with('success', 'Data berhasil ditambah');
    }

    public function editView($id)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::where(['id_kota' => $id_kota, 'id' => $id])->first();

        $kategories = Category::all();
        return view('admin.peralatan.edit', ['peralatan' => $peralatan, 'kategories' => $kategories]);
    }

    public function update(Request $request)
    {

        if ($request->file('filefoto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request['foto'] = $request->file('image')->store('isimateri-images');
        }

        Peralatan::where(['id' => $request['id']])->update($request->except('_token', 'baik', 'rusak_ringan', 'rusak_sedang', 'rusak_berat'));

        Kondisi::where('id_barang', $request['id'])->update([
            'baik' => $request['baik'],
            'rusak_ringan' => $request['rusak_ringan'],
            'rusak_sedang' => $request['rusak_sedang'],
            'rusak_berat' => $request['rusak_berat'],
        ]);

        return redirect()
            ->route('peralatan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $peralatan = Peralatan::where(['id' => $id])->first();
        if ($peralatan->foto != null) {
            Storage::delete($peralatan->foto);
        }
        Peralatan::where(['id' => $id])->delete();
        return redirect()
            ->route('peralatan.index')
            ->with('success', 'Data berhasil dihapus');
    }
    public function export(Request $request)
    {
        $myId = Auth::user()->id_kota;
        $namaKota = Kota::where('id', $myId)->get('nama_kota');
        return Excel::download(new PeralatanExport($myId, $namaKota), 'peralatan.xlsx');
    }
}
