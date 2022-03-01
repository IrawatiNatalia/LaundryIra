<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        $outlet = Outlet::all();
        return view('paket.index', [
            "title" => "data",
            "paket" => $paket,
            "outlet" => $outlet,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new paket;
        $data->id_outlet = $request->id_outlet;
        $data->jenis = $request->jenis;
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;    
        $data->save();

        return redirect('/paket')->with('input', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(paket $paket, $id)
    {
        $data = $paket::find($id);
        return view('paket.index', compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paket $paket)
    {
        paket::findOrFail($request->id)->update($request->all());    
        
        return redirect('/paket')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = paket::find($id);
        $data->delete();
        return redirect('/paket')->with('delete','Paket Berhasil Dihapus');
    }
}
