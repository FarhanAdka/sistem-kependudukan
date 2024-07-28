@extends('Component.bootstrap')
@section('title', $title)

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Detail Kartu Keluarga</h2>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <tr>
                    <th>No KK</th>
                    <td>{{ $data->no_kk }}</td>
                </tr>
                <tr>
                    <th>Nama KK</th>
                    <td>{{ $data->nama_kk }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>{{ $data->rt }}</td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>{{ $data->rw }}</td>
                </tr>
                <tr>
                    <th>Scan KK</th>
                    <td>
                        @if($data->scan_kk)
                            <a href="{{ Storage::url($data->scan_kk) }}" target="_blank">{{ basename($data->scan_kk) }}</a>
                        @else
                            Tidak ada file scan KK
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <h3>Daftar Anggota Keluarga</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penduduk as $person)
                <tr>
                    <td>{{ $person->nik }}</td>
                    <td>{{ $person->nama }}</td>
                    <td>{{ $person->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ url("/detailPenduduk/$person->id") }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/dataKK" class="btn btn-secondary">Kembali</a>
</div>
@endsection
