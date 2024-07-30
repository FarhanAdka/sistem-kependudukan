@extends('Component.bootstrap')
@section('title', $title)

@section('content')
    <!-- START INPUT KARTU KELUARGA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FLASH MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- HEADER -->
        <h2>{{ $title }}</h2>

        <!-- FORM INPUT -->
        <form action="/simpanKK" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="no_kk" class="form-label">Nomor KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" required maxlength="16">
            </div>
            <div class="mb-3">
                <label for="nama_kk" class="form-label">Nama KK</label>
                <input type="text" class="form-control" id="nama_kk" name="nama_kk" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <select class="form-control" id="alamat" name="alamat" required>
                    <option value="Dusun 1">Dusun 1</option>
                    <option value="Dusun 2">Dusun 2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt" name="rt" required min="1" max="20">
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw" name="rw" required min="1" max="5">
            </div>
            <div class="mb-3">
                <label for="scan_kk" class="form-label">Scan KK (PDF)</label>
                <input type="file" class="form-control" id="scan_kk" name="scan_kk" accept=".pdf">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dataKK" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <!-- AKHIR INPUT KARTU KELUARGA -->

    <style>
        .header {
            margin-bottom: 20px;
        }
        .admin-info span {
            display: block;
        }
    </style>
@endsection

