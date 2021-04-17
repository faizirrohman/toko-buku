@extends('layouts.admin', ['title' => 'ADMIN | Pasok'])

@section('content')

<div class="container-fluid">
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pasok</button>

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
                              <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="myTable">
                                    <thead>
                                          <tr>
                                                <th>No</th>
                                                <th>Nama Distributor</th>
                                                <th>Judul Buku</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($pasok as $items)
                                          <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $items->namaDistributor['nama_distributor'] }}</td>
                                                <td>{{ $items->kodeBuku['judul'] }}</td>
                                                <td>{{ $items->jumlah }}</td>
                                                <td>{{ $items->tanggal }}</td>
                                                <td>
                                                      <form action="{{ route('admin.pasok.destroy', $items->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                                                  Hapus
                                                            </button>
                                                            <a href="{{ route('admin.pasok.edit', $items->id) }}" class="btn-wide btn btn-outline-success">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah pasok</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('admin.pasok.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="id_distributor" class="form-label">Nama Distributor</label>
                                          <select name="id_distributor" class="form-select" id="id_distributor" required>
                                                <option>Pilih</option>
                                                @foreach($distributor as $item)
                                                      <option value="{{ $item->id }}">{{ $item->nama_distributor }}</option>
                                                @endforeach
                                          </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="id_buku" class="form-label">Judul Buku</label>
                                          <select name="id_buku" class="form-select" id="id_buku" required>
                                                <option>Pilih</option>
                                                @foreach($buku as $item)
                                                      <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                @endforeach
                                          </select>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="jumlah" class="form-label">Jumlah</label>
            
                                          <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="tanggal" class="form-label">Tanggal</label>
                                          <input type="date" name="tanggal" class="form-control" id="tanggal" required>
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