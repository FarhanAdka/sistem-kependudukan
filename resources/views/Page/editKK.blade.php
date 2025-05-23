@extends('Component.bootstrap')
@section('title', $title)

@section('content')
    <!-- START EDIT KARTU KELUARGA -->
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
        <div class="header d-flex justify-content-between align-items-center">
            <h2>{{ $title }}</h2>
        </div>

        <!-- FORM EDIT -->
        <form action="{{ url("/editKK/$data->id") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="no_kk" class="form-label">No KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $data->no_kk }}" required readonly>
            </div>
            <div class="mb-3">
                <label for="nama_kk" class="form-label">Nama KK</label>
                <input type="text" class="form-control" id="nama_kk" name="nama_kk" value="{{ $data->nama_kk }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <select class="form-control" id="alamat" name="alamat" required>
                    <option value="Dusun 1" {{ $data->alamat == 'Dusun 1' ? 'selected' : '' }}>Dusun 1</option>
                    <option value="Dusun 2" {{ $data->alamat == 'Dusun 2' ? 'selected' : '' }}>Dusun 2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" class="form-control" id="rt" name="rt" value="{{ $data->rt }}" required>
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" class="form-control" id="rw" name="rw" value="{{ $data->rw }}" required>
            </div>
            <div class="mb-3">
                <label for="scan_kk" class="form-label">Scan KK</label>
                <input type="file" class="form-control" id="scan_kk" name="scan_kk">
                @if($data->scan_kk)
                    <img src="data:image/jpeg;base64,{{ base64_encode($data->scan_kk) }}" alt="Scan KK" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/detailKK/{{ $data->id }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <!-- AKHIR EDIT KARTU KELUARGA -->

    <style>
        .header {
            margin-bottom: 20px;
        }
        .admin-info span {
            display: block;
        }
    </style>
@endsection

