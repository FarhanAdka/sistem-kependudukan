@extends('Component.bootstrap')
@section('content')
<div class="container">
    <h1>Tambah Data Penduduk</h1>
    <form action="{{ route('Penduduk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        </div>
        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" required>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
        </div>
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
        </div>
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
        </div>
        <div class="form-group">
            <label for="no_kk">No KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif">Aktif</option>
                <option value="meninggal">Meninggal</option>
                <option value="lahir">Lahir</option>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
