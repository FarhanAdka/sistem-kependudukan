@extends('Component.bootstrap')
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Detail Kartu Keluarga</h2>
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
        <a href="/dataKK" class="btn btn-secondary">Kembali</a>
    </div>
@endsection