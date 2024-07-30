@extends('Component.bootstrap')
@section('title', $info['title'])
@section('content')
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
    <h2>Edit Penduduk</h2>
    <form action="{{ url("/editPenduduk/$data->id") }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki" {{ $data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ $data->pendidikan }}" required>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $data->pekerjaan }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $data->nama_ayah }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_ibu" class="form-label">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $data->nama_ibu }}" required>
        </div>
        <div class="mb-3">
            <label for="no_kk" class="form-label">No KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $data->no_kk }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="meninggal" {{ $data->status == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                <option value="lahir" {{ $data->status == 'lahir' ? 'selected' : '' }}>Lahir</option>
                <option value="masuk" {{ $data->status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $data->status == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $data->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('Penduduk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
