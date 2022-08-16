<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\jadwal_garap;
use App\Models\sawah;
use Illuminate\Http\Request;

class JadwalGarapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal_garap.index',[
            'jadwal_garaps' => jadwal_garap::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal_garap.create',[
            'anggotas' =>anggota::all(),
            'sawahs' =>sawah::all()
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
            'sawah_id'=>'required',
            'tanggal_garap'=>'required'
          ]);
          jadwal_garap::create($validateData);
          return redirect('/jadwal_garap')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal_garap  $jadwal_garap
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal_garap $jadwal_garap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal_garap  $jadwal_garap
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_garap $jadwal_garap)
    {
        return view('jadwal_garap.edit',[
            'jadwal_garaps'=>$jadwal_garap,
            'anggotas'=>anggota::all(),
            'sawahs'=>sawah::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal_garap  $jadwal_garap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal_garap $jadwal_garap)
    {
        $validateData=$request->validate([
            'id_anggota'=>'required',
            'sawah_id'=>'required',
            'tanggal_garap'=>'required'
          ]);
          jadwal_garap::where('id',$jadwal_garap->id)->update($validateData);
          return redirect('/jadwal_garap')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal_garap  $jadwal_garap
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_garap $jadwal_garap)
    {
        jadwal_garap::destroy($jadwal_garap->id);
        return redirect('/jadwal_garap')->with('pesan','Data berhasil dihapus');
    }
}
