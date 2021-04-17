@extends('layouts.admin', ['title' => 'ADMIN | Laporan Semua Buku'])

@section('content')

<div class="container-fluid">
      <br>
      <div class="row">
            <div class="col-md-12">
                  <div class="main-card mb-3 card card-body">
                        <h3 style="text-align: center;">LAPORAN SEMUA BUKU</h3>
                        <tr>
                              <th>
                                    <a target="blank" href="{{ route('admin.laporan.semua-data-buku.print') }}" class="btn btn-primary" style="width: 70px;">Cetak</a>
                                    <a href="{{ route('admin.laporan.semua-data-buku.export') }}" class="btn btn-success" style="width: 120px;">Export Excel</a>
                              </th>
                        </tr>
                        
                        
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
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection