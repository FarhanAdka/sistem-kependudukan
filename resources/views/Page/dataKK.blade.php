@extends('Component.bootstrap')
@section('content')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='/inputKK' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">No. KK</th>
                    <th class="col-md-4">Nama KK</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-1">RT</th>
                    <th class="col-md-1">RW</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->no_kk }}</td>
                    <td>{{ $data->nama_kk }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->rt }}</td>
                    <td>{{ $data->rw }}</td>
                    <td>
                        <a href="/kartu-keluarga/{{ $data->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                        <a href="/kartu-keluarga/{{ $data->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/kartu-keluarga/{{ $data->id }}/delete" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
  </div>
  <!-- AKHIR DATA -->
@endsection

