@extends('Component.bootstrap')
@section('title', $title)
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
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_kk }}</td>
                    <td>{{ $item->nama_kk }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->rt }}</td>
                    <td>{{ $item->rw }}</td>
                    <td>
                        <a href="/detailKK/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/editKK/{{ $item->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Apakah anda yakin?')" class='d-inline' action="/deleteKK/{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $data->withQueryString()->links() }}
        </div>
  </div>
  <!-- AKHIR DATA -->
@endsection

