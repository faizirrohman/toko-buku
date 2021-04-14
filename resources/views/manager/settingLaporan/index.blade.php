@extends('layouts.manager', ['title' => 'MANAGER | Setting Laporan'])

@section('content')

<div class="container-fluid">
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Setting Laporan</button>

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
                                                <th>Logo</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Alamat</th>
                                                <th>No. Telpon</th>
                                                <th>Web</th>
                                                <th>No. Hp</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($settingLaporan as $items)
                                          <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('logo_photo/'.$items->logo) }}" width="80px" alt="" srcset=""></td>
                                                <td>{{ $items->nama_perusahaan }}</td>
                                                <td>{{ $items->alamat }}</td>
                                                <td>{{ $items->no_telpon }}</td>
                                                <td>{{ $items->web }}</td>
                                                <td>{{ $items->no_hp }}</td>
                                                <td>{{ $items->email }}</td>
                                                <td>
                                                      <form action="{{ route('manager.setting-laporan.destroy', $items->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                                                  Hapus
                                                            </button>
                                                            <a href="{{ route('manager.setting-laporan.edit', $items->id) }}" class="btn-wide btn btn-outline-success">
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
                        <h5 class="modal-title" id="exampleModalLabel">Setting Laporan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('manager.setting-laporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                          <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="alamat" class="form-label">Alamat</label>
                                          <input type="text" class="form-control" name="alamat" id="alamat" required>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="no_telpon" class="form-label">No. Telpon</label>
                                          <input type="text" name="no_telpon" class="form-control" id="no_telpon" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="web" class="form-label">Web</label>
                                          <input type="text" class="form-control" name="web" id="web" required>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="mb-3 col-md-6">
                                          <label for="logo" class="form-label">Logo</label>
                                          <input type="file" name="logo" class="form-control" id="logo" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                          <label for="no_hp" class="form-label">No. Hp</label>
                                          <input type="number" class="form-control" name="no_hp" id="no_hp" required>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="mb-3 col-md-12">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="email" name="email" class="form-control" id="email" required>
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