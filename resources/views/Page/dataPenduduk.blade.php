@extends('Component.bootstrap')
@section('title', $info['title'])

@section('content')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- HEADER -->
        <div class="header d-flex justify-content-between align-items-center">
            <h2>Data Penduduk</h2>
        </div>
        
        <!-- FORM PENCARIAN -->
        <div class="pb-3 d-flex justify-content-between">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary me-2" type="submit">Cari</button>
                <select class="form-select me-1" name="status" aria-label="Filter by Status">
                    <option value="">Tampilkan</option>
                    <option value="aktif" {{ Request::get('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="wafat" {{ Request::get('status') == 'wafat' ? 'selected' : '' }}>Meninggal</option>
                    <option value="lahir" {{ Request::get('status') == 'lahir' ? 'selected' : '' }}>Lahir</option>
                    <option value="masuk" {{ Request::get('status') == 'masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="keluar" {{ Request::get('status') == 'keluar' ? 'selected' : '' }}>Keluar</option>
                </select>
                <button class="btn btn-primary" type="submit">Terapkan</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='/inputPenduduk' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <!-- TABEL DATA -->
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
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/detailPenduduk/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/editPenduduk/{{ $item->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Apakah anda yakin?')" class='d-inline' action="/deletePenduduk/{{$item->id}}" method="post">
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
            <ul class="pagination">
                {{ $data->appends(Request::except('page'))->links() }}
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
