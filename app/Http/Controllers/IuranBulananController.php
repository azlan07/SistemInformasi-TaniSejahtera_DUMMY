<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\iuran_bulanan;
use Illuminate\Http\Request;

class IuranBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('iuran_bulanan.index',[
            'iuran_bulanans' => iuran_bulanan::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('iuran_bulanan.create',[
            'anggotas' =>anggota::all()
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
        $validateData=$request->validate([
            'id_anggota'=>'required',
            'tanggal'=>'required',
            'setoran'=>'required',
            'saldo'=>'required'
          ]);
          iuran_bulanan::create($validateData);
          return redirect('/iuran_bulanan')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\iuran_bulanan  $iuran_bulanan
     * @return \Illuminate\Http\Response
     */
    public function show(iuran_bulanan $iuran_bulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iuran_bulanan  $iuran_bulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(iuran_bulanan $iuran_bulanan)
    {
        return view('iuran_bulanan.edit',[
            'iuran_bulanans'=>$iuran_bulanan,
            'anggotas'=>anggota::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\iuran_bulanan  $iuran_bulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iuran_bulanan $iuran_bulanan)
    {
        $validateData=$request->validate([
            'id_anggota'=>'required',
            'tanggal'=>'required',
            'setoran'=>'required',
            'saldo'=>'required'
          ]);
          iuran_bulanan::where('id',$iuran_bulanan->id)->update($validateData);
          return redirect('/iuran_bulanan')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iuran_bulanan  $iuran_bulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(iuran_bulanan $iuran_bulanan)
    {
        iuran_bulanan::destroy($iuran_bulanan->id);
        return redirect('/iuran_bulanan')->with('pesan','Data berhasil dihapus');
    }
}
