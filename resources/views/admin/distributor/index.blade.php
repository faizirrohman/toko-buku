@extends('layouts.admin', ['title' => 'ADMIN | Distributor'])

@section('content')

<div class="container-fluid">
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Distributor</button>

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
                                                <th>Telpon</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($distributor as $items)
                                          <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $items->nama_distributor }}</td>
                                                <td>{{ $items->telpon }}</td>
                                                <td>{{ $items->alamat }}</td>
                                                <td>
                                                      <form action="{{ route('admin.distributor.destroy', $items->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                                                  Hapus
                                                            </button>
                                                            <a href="{{ route('admin.distributor.edit', $items->id) }}" class="btn-wide btn btn-outline-success">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Distributor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('admin.distributor.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="nama_distributor" class="form-label">Nama Distributor</label>
                                          <input type="text" class="form-control" name="nama_distributor" id="nama_distributor" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="telpon" class="form-label">Telpon</label>
                                          <input type="number" class="form-control" name="telpon" id="telpon" required>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="mb-3">
                                          <label for="alamat" class="form-label">Alamat</label>
                                          <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="5" required></textarea>
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