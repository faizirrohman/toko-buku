<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\SettingLaporan;
use Illuminate\Http\Request;

class SettingLaporanController extends Controller
{
    public function index()
    {
        $settingLaporan = SettingLaporan::latest()->get();
        return view('manager.settingLaporan.index', compact('settingLaporan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'web' => 'required',
            'logo' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $file = $request->logo;
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path().'/logo_photo', $namaFile);
        SettingLaporan::create([
            "nama_perusahaan" => $request->nama_perusahaan,
            "alamat" => $request->alamat,
            "no_telpon" => $request->no_telpon,
            "web" => $request->web,
            'logo' => $namaFile,
            "no_hp" => $request->no_hp,
            "email" => $request->email
        ]);
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('manager.setting-laporan.index')->with('success', 'Setting Laporan berhasil di simpan');
    }

    public function edit($id)
    {
        $settingLaporan = SettingLaporan::findOrFail($id);
        return view('manager.settingLaporan.edit', compact('settingLaporan'));
    }

    public function update(Request $request, $id)
    {
        $settingLaporan = SettingLaporan::findOrFail($id);
        if($request->file('logo') != null && $request->hasFile('logo'))
        {
            $file = 'logo_photo/'.$settingLaporan->logo;
            if(is_file($file))
            {
                unlink($file);
            }
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $request->file('logo')->move('logo_photo/', $filename);
            $settingLaporan->logo = $filename;
        }
        $settingLaporan->nama_perusahaan = $request->nama_perusahaan;
        $settingLaporan->alamat = $request->alamat;
        $settingLaporan->no_telpon = $request->no_telpon;
        $settingLaporan->web = $request->web;
        $settingLaporan->no_hp = $request->no_hp;
        $settingLaporan->email = $request->email;
        $settingLaporan->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('manager.setting-laporan.index')->with('success', 'Setting Laporan berhasil di perbaharui');
    }

    public function destroy($id)
    {
        $data = SettingLaporan::findOrFail($id);
        $file = 'logo_photo/'.$data->logo;
        if(is_file($file))
        {
            unlink($file);
        }
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('manager.setting-laporan.index')->with('success', 'Setting Laporan berhasil di hapus');
    }
}
