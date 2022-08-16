<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\sawah;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'anggotas' => anggota::latest()->paginate(8),
            'sawahs' => sawah::latest()->paginate(8)
        ]);
    }
}
