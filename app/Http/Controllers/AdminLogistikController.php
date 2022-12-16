<?php

namespace App\Http\Controllers;

use App\Models\Logistik;
use App\Http\Requests\StoreLogistikRequest;
use App\Http\Requests\UpdateLogistikRequest;
use Illuminate\Support\Facades\Auth;


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
        $logistiks = Logistik::where('id_kota',$id_kota)->get();
        return view('admin.logistik.index',['logistiks'=>$logistiks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogistikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogistikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function show(Logistik $logistik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistik $logistik)
    {
        //
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
    public function destroy(Logistik $logistik)
    {
        //
    }
}
