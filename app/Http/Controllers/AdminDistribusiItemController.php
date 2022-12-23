<?php

namespace App\Http\Controllers;

use App\Models\DistribusiItem;
use App\Models\Kota;
use App\Models\Logistik;
use Illuminate\Http\Request;

class AdminDistribusiItemController extends Controller
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
    public function create()
    {
    }

    public function createView(Request $request, $id)
    {

        if ($request->id_kota) {
            $logistik = Logistik::where('id_kota', $request->id_kota)->get();
        } else {
            $logistik = Logistik::all();
        }



        return view('admin.distribusi.actionItem.create', [
            'kotas' => Kota::all(),
            "logistiks" => $logistik,
            'idDistribusi' => $id
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
        DistribusiItem::create([
            'id_distribusi' => $request['idDistribusi'],
            'id_logistik' => $request['id_logistik'],
            'jumlah' => $request['jumlah'],
        ]);

        return redirect()->route('distribusi.draftView', $request['idDistribusi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
