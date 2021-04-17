@extends('layouts.admin', ['title' => 'ADMIN | Edit Distributor'])

@section('content')

<div class="container-fluid">
      <br>
      <a href="{{ route('admin.distributor.index') }}" class="btn btn-secondary">Kembali</a>

      <br>
      <br>

      
      <div class="row">
            <div class="col-md-12">
                  <div class="main-card mb-3 card card-body">
                        <div class="table-responsive">
                              <form action="{{ route('admin.distributor.update', $distributor->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="body">
                                          <div class="row">
                                                <div class="mb-3 col-md-6">
                                                      <label for="nama_distributor" class="form-label">Nama Distributor</label>
                                                      <input type="text" class="form-control" name="nama_distributor" id="nama_distributor" value="{{ $distributor->nama_distributor }}" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                      <label for="telpon" class="form-label">Telpon</label>
                                                      <input type="number" class="form-control" name="telpon" id="telpon" value="{{ $distributor->telpon }}" required>
                                                </div>
                                          </div>

                                          <div class="row">
                                                <div class="mb-3">
                                                      <label for="alamat" class="form-label">Alamat</label>
                                                      <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="5">{{ $distributor->alamat }}</textarea>
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Perbaharui</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection