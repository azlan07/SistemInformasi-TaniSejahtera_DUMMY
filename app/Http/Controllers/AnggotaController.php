<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\sawah;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anggota.index',[
            'anggotas' => anggota::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create',[
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
            'nik'=>'required|unique:anggotas|size:16',
            'nama'=>'required',
            'jenis_kelamin'=>'required|in:L,P',
            'sawah_id'=>'required',
            'alamat'=>'required'
          ]);
          anggota::create($validateData);
          return redirect('/anggota')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(anggota $anggota, $id)
    {
        return view('anggota.edit',[
            'anggotas'=>anggota::find($id),
            'sawahs'=>sawah::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $anggota, $id)
    {
        $validateData=$request->validate([
            'nik'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>'required|in:L,P',
            'sawah_id'=>'required',
            'alamat'=>'required'
          ]);
          anggota::where('id',$id)->update($validateData);
          return redirect('/anggota')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(anggota $anggota, $id)
    {
        anggota::destroy($id);
        return redirect('/anggota')->with('pesan','Data berhasil dihapus');
    }
}
