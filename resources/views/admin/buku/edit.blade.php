@extends('layouts.admin', ['title' => 'ADMIN | Edit Buku'])

@section('content')

<div class="container-fluid">
      <br>
      <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">Kembali</a>

      <br>
      <br>

      
      <div class="row">
            <div class="col-md-12">
                  <div class="main-card mb-3 card card-body">
                        <div class="table-responsive">
                              <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="body">
                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="kode_buku" class="form-label">Kode Buku</label>
                                                      <input type="text" class="form-control" name="kode_buku" id="kode_buku" value="{{ $buku->kode_buku }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="judul" class="form-label">Judul</label>
                                                      <input type="text" class="form-control" name="judul" id="judul" value="{{ $buku->judul }}" required>
                                                </div>
                                          </div>

                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="noisbn" class="form-label">No. ISBN</label>
                                                      <input type="text" name="noisbn" class="form-control" id="noisbn" value="{{ $buku->noisbn }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="penulis" class="form-label">Penulis</label>
                                                      <input type="text" class="form-control" name="penulis" id="penulis" value="{{ $buku->penulis }}" required>
                                                </div>
                                          </div>

                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="penerbit" class="form-label">Penerbit</label>
                                                      <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $buku->penerbit }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="tahun" class="form-label">Tahun</label>
                                                      <input type="text" class="form-control" name="tahun" id="tahun" value="{{ $buku->tahun }}" required>
                                                </div>
                                          </div>

                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="stok" class="form-label">Stok</label>
                                                      <input type="number" name="stok" class="form-control" id="stok" value="{{ $buku->stok }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="harga_pokok" class="form-label">Harga Pokok</label>
                                                      <input type="number" class="form-control" name="harga_pokok" id="harga_pokok" value="{{ $buku->harga_pokok }}" required>
                                                </div>
                                          </div>

                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="harga_jual" class="form-label">Harga Jual</label>
                                                      <input type="number" name="harga_jual" class="form-control" id="harga_jual" value="{{ $buku->harga_jual }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="ppn" class="form-label">PPN</label>
                                                      <input type="number" class="form-control" name="ppn" id="ppn" value="{{ $buku->ppn }}" required>
                                                </div>
                                          </div>
                                          
                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="diskon" class="form-label">Diskon</label>
                                                      <input type="number" name="diskon" class="form-control" id="diskon" value="{{ $buku->diskon }}" required>
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Perbaharui</button>
                                    </div>
                              </form>
                              <br>
                        </div>
                  </div>
            </div>
      </div>
</div>
<br>

@endsection