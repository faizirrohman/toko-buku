@extends('layouts.admin', ['title' => 'MANAGER | Edit Setting Laporan'])

@section('content')

<div class="container-fluid">
      <br>
      <a href="{{ route('manager.setting-laporan.index') }}" class="btn btn-secondary">Kembali</a>

      <br>
      <br>

      
      <form action="{{ route('manager.setting-laporan.update', $settingLaporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="body">
                  <div class="row">
                        <div class="mb-3 col-md-6">
                              <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                              <input type="text" class="form-control" name="nama_perusahaan" value="{{ $settingLaporan->nama_perusahaan }}" id="nama_perusahaan" required>
                        </div>
                        <div class="mb-3 col-md-6">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text" class="form-control" name="alamat" value="{{ $settingLaporan->alamat }}" id="alamat" required>
                        </div>
                  </div>
                  <div class="row">
                        <div class="mb-3 col-md-6">
                              <label for="no_telpon" class="form-label">No. Telpon</label>
                              <input type="text" name="no_telpon" class="form-control" value="{{ $settingLaporan->no_telpon }}" id="no_telpon" required>
                        </div>
                        <div class="mb-3 col-md-6">
                              <label for="web" class="form-label">Web</label>
                              <input type="text" class="form-control" name="web" value="{{ $settingLaporan->web }}" id="web" required>
                        </div>
                  </div>

                  <div class="row">
                        <div class="mb-3 col-md-6">
                              <label for="logo" class="form-label">Ganti Logo</label>
                              <input type="file" name="logo" class="form-control" id="logo" required>
                        </div>
                        <img src="{{ asset('logo_photo/'.$settingLaporan->logo) }}" style="width: 122px; height: 100px;" alt="">
                        
                  </div>

                  <div class="row">
                        <div class="mb-3 col-md-6">
                              <label for="no_hp" class="form-label">No. Hp</label>
                              <input type="number" class="form-control" name="no_hp" value="{{ $settingLaporan->no_hp }}" id="no_hp" required>
                        </div>
                        <div class="mb-3 col-md-6">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control" value="{{ $settingLaporan->email }}" id="email" required>
                        </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Perbaharui</button>
            </div>
      </form>
</div>
<br>

@endsection