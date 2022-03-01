<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use Illuminate\Http\Request;

class BarangInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BarangInventaris::all();
        return view('barangInventaris.index', compact('data'));
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
        $data = New BarangInventaris;
        $data->nama_barang = $request->nama_barang;    
        $data->merk_barang = $request->merk_barang;    
        $data->qty = $request->qty;    
        $data->kondisi = $request->kondisi;    
        $data->tgl_pengadaan = $request->tgl_pengadaan;     
        $data->save();
        
        return redirect('/barangInventaris')->with('input', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangInventaris  $BarangInventaris
     * @return \Illuminate\Http\Response
     */
    public function show(barangInventaris $barangInventaris, $id)
    {
        $data = $barangInventaris::find($id);
        return view('barangInventaris.index', compact('data'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangInventaris  $BarangInventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(barangInventaris $barangInventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangInventaris  $BarangInventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barangInventaris $barangInventaris)
    {
        BarangInventaris::findOrFail($request->id)->update($request->all());    
        
        return redirect('/barangInventaris')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangInventaris  $BarangInventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BarangInventaris::find($id);
        $data->delete();
        return redirect('/barangInventaris')->with('delete','Paket Berhasil Dihapus');
    }
}
