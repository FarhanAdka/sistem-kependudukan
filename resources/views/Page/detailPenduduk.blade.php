@extends('Component.bootstrap')
@section('title', $title)
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
    <h2>Detail Penduduk</h2>
    <table class="table table-striped">
        <tr>
            <th>NIK</th>
            <td>{{ $penduduk->nik }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $penduduk->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $penduduk->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $penduduk->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $penduduk->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>{{ $penduduk->pendidikan }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $penduduk->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Nama Ayah</th>
            <td>{{ $penduduk->nama_ayah }}</td>
        </tr>
        <tr>
            <th>Nama Ibu</th>
            <td>{{ $penduduk->nama_ibu }}</td>
        </tr>
        <tr>
            <th>No KK</th>
            <td>{{ $penduduk->no_kk }}</td>
        </tr>
        <tr>
            <th>Nama KK</th>
            <td>{{ $kartuKeluarga->nama_kk }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $kartuKeluarga->alamat }}</td>
        </tr>
        <tr>
            <th>RT</th>
            <td>{{ $kartuKeluarga->rt }}</td>
        </tr>
        <tr>
            <th>RW</th>
            <td>{{ $kartuKeluarga->rw }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $penduduk->status }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $penduduk->keterangan }}</td>
        </tr>
    </table>
    <a href="{{ route('Penduduk.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
