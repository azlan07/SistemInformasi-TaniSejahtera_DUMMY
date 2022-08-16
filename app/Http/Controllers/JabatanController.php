<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jabatan.index',[
            'jabatans' => jabatan::latest()->paginate(8)
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create',[
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
            'jabatan'=>'required'
          ]);
          jabatan::create($validateData);
          return redirect('/jabatan')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(jabatan $jabatan)
    {
        return view('jabatan.edit',[
            'jabatans'=>$jabatan,
            'anggotas'=>anggota::all()
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jabatan $jabatan)
    {
        $validateData=$request->validate([
            'id_anggota'=>'required',
            'jabatan'=>'required'
          ]);
          jabatan::where('id',$jabatan->id)->update($validateData);
          return redirect('/jabatan')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jabatan $jabatan)
    {
        jabatan::destroy($jabatan->id);
        return redirect('/jabatan')->with('pesan','Data berhasil dihapus');
    }
}
