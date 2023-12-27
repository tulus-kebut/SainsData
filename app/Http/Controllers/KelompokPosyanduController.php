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
            'kode_posyandu' => 'required|regex:/^PYD\d{4}$/',
            'nama_posyandu' => 'required|string|max:50'
        ]);

        Posyandu::create([
            'kode_posyandu' => $request->kode_posyandu,
            'nama_posyandu' => $request->nama_posyandu
        ]);

        return redirect()->route('kelompok-posyandu')->with('success', 'Kelompok Posyandu berhasil ditambah');
    }

    // HALAMAN EDIT DATA KELOMPOK POSYANDU
    public function edit($kode)
    {
        $title = 'Edit Data Kelompok Posyandu';

        $datas = Posyandu::where('kode_posyandu', $kode)->first();
        return view('admin.kelompok-posyandu.edit', compact('title', 'datas'));
    }

    // PROSES EDIT DATA KELOMPOK POSYANDU
    public function update(Request $request, string $kode)
    {
        $posyandu = Posyandu::where('kode_posyandu', $kode)->first();

        $request->validate([
            'kode_posyandu' => 'required|max:8',
            'nama_posyandu' => 'required|string|max:50'
        ]);

        $posyandu->update([
            'kode_posyandu' => $request->kode_posyandu,
            'nama_posyandu' => $request->nama_posyandu
        ]);

        return redirect()->route('kelompok-posyandu')->with('success', 'Data Stunting berhasil diubah');
    }

    // PROSES HAPUS DATA KELOMPOK POSYANDU
    public function destroy($kode)
    {
        Posyandu::where('kode_posyandu', $kode)->delete();

        return redirect()->route('kelompok-posyandu');
    }
}
