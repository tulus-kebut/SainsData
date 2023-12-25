<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;

class KelompokPosyanduController extends Controller
{
    // TAMPIL DATA KELOMPOK POSYANDU
    public function index()
    {
        $title = 'Kelompok Posyandu';

        $datas = Posyandu::orderBy('id', 'ASC')->paginate(10);
        return view('admin.kelompok-posyandu.index', compact('title', 'datas'));
    }

    // HALAMAN TAMBAH DATA KELOMPOK POSYANDU
    public function create()
    {   
        $title = 'Tambah Data Kelompok Posyandu';

        return view('admin.kelompok-posyandu.create', compact('title'));
    }

    // PROSES TAMBAH DATA KELOMPOK POSYANDU
    public function store(Request $request)
    {
        $request->validate([
            'kode_posyandu' => 'required|regex:/^PYD\d{6}$/',
            'nama_posyandu' => 'required|string|max:50'
        ]);

        Posyandu::create([
            'kode_posyandu' => $request->kode_posyandu,
            'nama_posyandu' => $request->nama_posyandu
        ]);

        return redirect()->route('kelompok-posyandu')->with('success', 'Kelompok Posyandu berhasil ditambah');
    }

    // HALAMAN EDIT DATA KELOMPOK POSYANDU
    public function edit($id)
    {
        
    }
}
