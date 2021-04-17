<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->get();
        return view('admin.buku.index', compact('buku'));
    }

    public function bukuExport() {
        return Excel::download(new BukuExport, 'Laporan Semua Data Buku.xlsx');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'stok' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'ppn' => 'required',
            'diskon' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Buku::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil di simpan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'noisbn' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'stok' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'ppn' => 'required',
            'diskon' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Buku::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil di perbaharui');
    }

    public function destroy($id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil di hapus');
    }
}
