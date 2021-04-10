<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasok;

class PasokController extends Controller
{
    public function index()
    {
        $pasok = Pasok::latest()->get();
        return view('admin.pasok.index', compact('pasok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_distributor' => 'required',
            'id_buku' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);
        Pasok::create($request->all());
        return redirect()->route('admin.pasok.index')->with('success', 'Pasok berhasil di simpan');
    }

    public function edit($id)
    {
        $pasok = Pasok::findOrFail($id);
        return view('admin.pasok.edit', compact('pasok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_distributor' => 'required',
            'id_buku' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);
        Pasok::findOrFail($id)->update($request->all());
        return redirect()->route('admin.pasok.index')->with('success', 'Pasok berhasil di perbaharui');
    }

    public function destroy($id)
    {
        $data = Pasok::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.pasok.index')->with('success', 'Pasok berhasil di hapus');
    }
}
