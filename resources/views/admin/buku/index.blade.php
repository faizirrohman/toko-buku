@extends('layouts.admin', ['title' => 'ADMIN | Buku'])

@section('content')

<div class="container-fluid">
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Buku</button>

      <br>
      
      @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      @endif

      <br>

      <div class="row">
            <div class="col-md-12">
                  <div class="main-card mb-3 card card-body">
                        <div class="table-responsive">
                              <table class="table table-hover" id="myTable">
                                    <thead>
                                          <tr>
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Judul</th>
                                                <th>NO ISBN</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun</th>
                                                <th>Stok</th>
                                                <th>Harga Pokok</th>
                                                <th>Harga Jual</th>
                                                <th>PPN</th>
                                                <th>Diskon</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($buku as $items)
                                          <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $items->kode_buku }}</td>
                                                <td>{{ $items->judul }}</td>
                                                <td>{{ $items->noisbn }}</td>
                                                <td>{{ $items->penulis }}</td>
                                                <td>{{ $items->penerbit }}</td>
                                                <td>{{ $items->tahun }}</td>
                                                <td>{{ $items->stok }}</td>
                                                <td>Rp{{ number_format($items->harga_pokok, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($items->harga_jual, 0, ',', '.') }}</td>   
                                                <td>{{ $items->ppn }}%</td>
                                                <td>{{ $items->diskon }}%</td>
                                                <td>
                                                      <form action="{{ route('admin.buku.destroy', $items->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                                                  Hapus
                                                            </button>
                                                            <a href="{{ route('admin.buku.edit', $items->id) }}" class="btn-wide btn btn-outline-success">
                                                                  Edit
                                                            </a>
                                                      </form>
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="exampleModal" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('admin.buku.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="kode_buku" class="form-label">Kode Buku</label>
                                          <input type="text" class="form-control" name="kode_buku" id="kode_buku" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="judul" class="form-label">Judul</label>
                                          <input type="text" class="form-control" name="judul" id="judul" required>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="noisbn" class="form-label">No. ISBN</label>
                                          <input type="text" name="noisbn" class="form-control" id="noisbn" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="penulis" class="form-label">Penulis</label>
                                          <input type="text" class="form-control" name="penulis" id="penulis" required>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="penerbit" class="form-label">Penerbit</label>
                                          <input type="text" name="penerbit" class="form-control" id="penerbit" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="tahun" class="form-label">Tahun Terbit</label>
                                          <input type="number" class="form-control" name="tahun" id="tahun" required>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="stok" class="form-label">Stok</label>
                                          <input type="number" name="stok" class="form-control" id="stok" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="harga_pokok" class="form-label">Harga Pokok</label>
                                          <input type="number" class="form-control" name="harga_pokok" id="harga_pokok" required>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="harga_jual" class="form-label">Harga Jual</label>
                                          <input type="number" name="harga_jual" class="form-control" id="harga_jual" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="ppn" class="form-label">PPN(%)</label>
                                          <input type="number" class="form-control" name="ppn" id="ppn" required>
                                    </div>
                              </div>
                              
                              <div class="row">
                                    <div class="mb-3">
                                          <label for="diskon" class="form-label">Diskon(%)</label>
                                          <input type="number" name="diskon" class="form-control" id="diskon" required>
                                    </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                  </form>
            </div>
      </div>
</div>

@endsection