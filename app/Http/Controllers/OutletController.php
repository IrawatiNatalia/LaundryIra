<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = outlet::all();
        return view('outlet.index', compact('data'));
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
        $data = new outlet;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;    
        $data->save();

        return redirect('/outlet')->with('input', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, outlet $outlet)
    {
        $data = outlet::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;    
        $data->save();

        return redirect('/outlet')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = outlet::find($id);
        $data->delete();
        return redirect('/outlet')->with('delete','Paket Berhasil Dihapus');
    }
}
