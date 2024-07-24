@extends('Component.bootstrap')
@section('title', $title)
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Detail Penduduk</h2>
    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <p>{{ $penduduk->nik }}</p>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <p>{{ $penduduk->nama }}</p>
    </div>
    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <p>{{ $penduduk->jenis_kelamin }}</p>
    </div>
    <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <p>{{ $penduduk->tempat_lahir }}</p>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <p>{{ $penduduk->tanggal_lahir }}</p>
    </div>
    <div class="mb-3">
        <label for="pendidikan" class="form-label">Pendidikan</label>
        <p>{{ $penduduk->pendidikan }}</p>
    </div>
    <div class="mb-3">
        <label for="pekerjaan" class="form-label">Pekerjaan</label>
        <p>{{ $penduduk->pekerjaan }}</p>
    </div>
    <div class="mb-3">
        <label for="nama_ayah" class="form-label">Nama Ayah</label>
        <p>{{ $penduduk->nama_ayah }}</p>
    </div>
    <div class="mb-3">
        <label for="nama_ibu" class="form-label">Nama Ibu</label>
        <p>{{ $penduduk->nama_ibu }}</p>
    </div>
    <div class="mb-3">
        <label for="no_kk" class="form-label">No KK</label>
        <p>{{ $penduduk->no_kk }}</p>
    </div>
    <div class="mb-3">
        <label for="nama_kk" class="form-label">Nama KK</label>
        <p>{{ $kartuKeluarga->nama_kk }}</p>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <p>{{ $kartuKeluarga->alamat }}</p>
    </div>
    <div class="mb-3">
        <label for="rt" class="form-label">RT</label>
        <p>{{ $kartuKeluarga->rt }}</p>
    </div>
    <div class="mb-3">
        <label for="rw" class="form-label">RW</label>
        <p>{{ $kartuKeluarga->rw }}</p>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <p>{{ $penduduk->status }}</p>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <p>{{ $penduduk->keterangan }}</p>
    </div>
    <a href="{{ route('Penduduk.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection