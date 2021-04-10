<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::latest()->get();
        return view('admin.distributor.index', compact('distributor'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Distributor::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil di simpan');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Distributor::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil di perbaharui');
    }

    public function destroy($id)
    {
        $data = Distributor::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.distributor.index')->with('success', 'Distributor berhasil di hapus');
    }
}
