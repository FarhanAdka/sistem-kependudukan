@extends('Component.bootstrap')
@section('title', $info['title'])

@section('content')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- HEADER -->
        <div class="header d-flex justify-content-between align-items-center">
            <h2>Data Kartu Keluarga</h2>
        </div>

        <!-- FORM PENCARIAN -->
        <div class="pb-3 d-flex justify-content-between">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <select class="form-select me-1" name="dusun" aria-label="Filter by Dusun">
                    <option value="">Pilih Dusun</option>
                    <option value="Dusun 1" {{ Request::get('dusun') == 'Dusun 1' ? 'selected' : '' }}>Dusun 1</option>
                    <option value="Dusun 2" {{ Request::get('dusun') == 'Dusun 2' ? 'selected' : '' }}>Dusun 2</option>
                </select>
                <input class="form-control me-1" type="number" name="rt" value="{{ Request::get('rt') }}" placeholder="RT" aria-label="RT">
                <input class="form-control me-1" type="number" name="rw" value="{{ Request::get('rw') }}" placeholder="RW" aria-label="RW">
                <button class="btn btn-secondary me-2" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='/inputKK' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <!-- TABEL DATA -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">No. KK</th>
                    <th class="col-md-3">Nama KK</th>
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
        
        <!-- PAGINATION -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $data->withQueryString()->links() }}
            </ul>
        </nav>
    </div>
    <!-- AKHIR DATA -->

    <style>
        .header {
            margin-bottom: 20px;
        }
        .admin-info span {
            display: block;
        }
    </style>
@endsection
