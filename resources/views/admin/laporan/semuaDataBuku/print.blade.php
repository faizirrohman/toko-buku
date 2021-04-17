<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <title>Cetak Semua Data Buku</title> --}}
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535
        }
    </style>
</head>
<body style="font-family: sans-serif" onload="window.print()">
    <div class="row">
        <div class="col-md-12">
              <div class="main-card mb-3 card card-body">
                    <h3 style="text-align: center;">LAPORAN SEMUA BUKU</h3>
                    <br>
                    <div class="table-responsive">
                          <table class="table table-bordered">
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
</body>
</html>