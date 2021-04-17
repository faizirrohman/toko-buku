<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function semuaDataBuku()
    {
        $buku = Buku::latest()->get();
        return view('admin.laporan.semuaDataBuku.index', compact('buku'));
    }
}
