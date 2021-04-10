@extends('layouts.admin', ['title' => 'ADMIN | Tambah Buku'])

@section('content')
      <br>
      <h1 style="text-align: center;">Tambah Buku</h1>
      <br>
      <form action="" method="POST">
            <div class="mb-3">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" required>
            </div>
            <div class="mb-3">
                  <label for="noisbn" class="form-label">No. ISBN</label>
                  <input type="text" name="noisbn" class="form-control" id="noisbn" required>
            </div>
            <div class="mb-3">
                  <label for="penulis" class="form-label">Penulis</label>
                  <input type="text" class="form-control" name="penulis" id="penulis" required>
            </div>
            <div class="mb-3">
                  <label for="penerbit" class="form-label">Penerbit</label>
                  <input type="text" name="penerbit" class="form-control" id="penerbit" required>
            </div>
            <div class="mb-3">
                  <label for="tahun" class="form-label">Tahun</label>
                  <input type="text" class="form-control" name="tahun" id="tahun" required>
            </div>
            <div class="mb-3">
                  <label for="stok" class="form-label">Stok</label>
                  <input type="number" name="stok" class="form-control" id="stok" required>
            </div>
            <div class="mb-3">
                  <label for="harga_pokok" class="form-label">Harga Pokok</label>
                  <input type="number" class="form-control" name="harga_pokok" id="harga_pokok" required>
            </div>
            <div class="mb-3">
                  <label for="harga_jual" class="form-label">Harga Jual</label>
                  <input type="number" name="harga_jual" class="form-control" id="harga_jual" required>
            </div>
            <div class="mb-3">
                  <label for="ppn" class="form-label">PPN</label>
                  <input type="number" class="form-control" name="ppn" id="ppn" required>
            </div>
            <div class="mb-3">
                  <label for="diskon" class="form-label">Diskon</label>
                  <input type="number" name="diskon" class="form-control" id="diskon" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <br>
@endsection