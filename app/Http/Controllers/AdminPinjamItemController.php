<?php

namespace App\Http\Controllers;

use App\Models\PinjamItem;
use App\Models\Kota;
use App\Http\Requests\StorePinjamItemRequest;
use App\Http\Requests\UpdatePinjamItemRequest;
use App\Models\Peralatan;
use Illuminate\Http\Request;

class AdminPinjamItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createView(Request $request, $id)
    {
        if ($request->id_kota) {
            $logistik = Peralatan::where('id_kota', $request->id_kota)->get();
        } else {
            $logistik = Peralatan::all();
        }


        return view('admin.pinjam.actionItem.create', [
            'kotas' => Kota::all(),
            "peralatans" => $logistik,
            'idPinjam' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PinjamItem::create([
            'id_pinjam' => $request['idPinjam'],
            'id_peralatan' => $request['id_peralatan'],
            'jumlah' => $request['jumlah'],
        ]);

        return redirect()->route('pinjam.draftView', $request['idPinjam']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinjamItem  $pinjamItem
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamItem $pinjamItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinjamItem  $pinjamItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PinjamItem $pinjamItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePinjamItemRequest  $request
     * @param  \App\Models\PinjamItem  $pinjamItem
     * @return \Illuminate\Http\Response
     */
    public function update(PinjamItem $pinjamItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinjamItem  $pinjamItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamItem $pinjamItem)
    {
        //
    }
}
