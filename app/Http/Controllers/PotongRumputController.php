<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\potong_rumput;
use Illuminate\Http\Request;

class PotongRumputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('potong_rumput.index',[
            'potong_rumputs' => potong_rumput::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('potong_rumput.create',[
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
            'kode_potong_rumput'=>'required',
            'id_anggota'=>'required',
            'tanggal_pinjam'=>'required',
            'tanggal_kembali'=>'required'
          ]);
          potong_rumput::create($validateData);
          return redirect('/potong_rumput')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\potong_rumput  $potong_rumput
     * @return \Illuminate\Http\Response
     */
    public function show(potong_rumput $potong_rumput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\potong_rumput  $potong_rumput
     * @return \Illuminate\Http\Response
     */
    public function edit(potong_rumput $potong_rumput)
    {
        return view('potong_rumput.edit',[
            'potong_rumputs'=>$potong_rumput,
            'anggotas'=>anggota::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\potong_rumput  $potong_rumput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, potong_rumput $potong_rumput)
    {
        $validateData=$request->validate([
            'kode_potong_rumput'=>'required',
            'id_anggota'=>'required',
            'tanggal_pinjam'=>'required',
            'tanggal_kembali'=>'required'
          ]);
          potong_rumput::where('id',$potong_rumput->id)->update($validateData);
          return redirect('/potong_rumput')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\potong_rumput  $potong_rumput
     * @return \Illuminate\Http\Response
     */
    public function destroy(potong_rumput $potong_rumput)
    {
        potong_rumput::destroy($potong_rumput->id);
        return redirect('/potong_rumput')->with('pesan','Data berhasil dihapus');
    }

    public function print()
    {
        return view('potong_rumput.print',[
            'potong_rumputs' =>potong_rumput::latest()->paginate(8)
          ]);
    }
}
