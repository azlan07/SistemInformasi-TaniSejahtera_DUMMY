<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\traktor;
use Illuminate\Http\Request;

class TraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('traktor.index',[
            'traktors' => traktor::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('traktor.create',[
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
            'kode_traktor'=>'required',
            'id_anggota'=>'required',
            'tanggal_pinjam'=>'required',
            'tanggal_kembali'=>'required'
          ]);
          traktor::create($validateData);
          return redirect('/traktor')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\traktor  $traktor
     * @return \Illuminate\Http\Response
     */
    public function show(traktor $traktor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\traktor  $traktor
     * @return \Illuminate\Http\Response
     */
    public function edit(traktor $traktor)
    {
        return view('traktor.edit',[
            'traktors'=>$traktor,
            'anggotas'=>anggota::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\traktor  $traktor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, traktor $traktor)
    {
        $validateData=$request->validate([
            'kode_traktor'=>'required',
            'id_anggota'=>'required',
            'tanggal_pinjam'=>'required',
            'tanggal_kembali'=>'required'
          ]);
          traktor::where('id',$traktor->id)->update($validateData);
          return redirect('/traktor')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\traktor  $traktor
     * @return \Illuminate\Http\Response
     */
    public function destroy(traktor $traktor)
    {
        traktor::destroy($traktor->id);
        return redirect('/traktor')->with('pesan','Data berhasil dihapus');
    }

    public function print()
    {
        return view('traktor.print',[
            'traktors' => traktor::latest()->paginate(8)
          ]);
    }
}
