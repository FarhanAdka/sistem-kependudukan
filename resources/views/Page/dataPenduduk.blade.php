@extends('Component.bootstrap')
@section('title', $info['title'])
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
          <a href='/inputPenduduk' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">NIK</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Jenis Kelamin</th>
                    <th class="col-md-1">Status</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                        <a href="/detailPenduduk/{{$data->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/editPenduduk/{{ $data->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Apakah anda yakin?')" class='d-inline' action="/deletePenduduk/{{$data->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
  </div>
  <!-- AKHIR DATA -->
@endsection