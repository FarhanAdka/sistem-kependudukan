@extends('Component.bootstrap')
@section('title', $info['title'])

@section('content')
    <!-- START DASHBOARD -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- HEADER -->
        <div class="header d-flex justify-content-between align-items-center">
            <h2>{{ $info['title'] }}</h2>
            <div class="admin-info">
                <span>Admin Desa Banglarangan</span>
                <span>{{ $info['name'] }}</span>
            </div>
        </div>

        <!-- DASHBOARD CONTENT -->
        <div class="row">
            <!-- Existing Cards -->
            <!-- ... -->

            <!-- New Section: Jumlah Kartu Keluarga per RW -->
            <div class="col-md-12 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Kartu Keluarga</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    @foreach (range(1, 5) as $rw)
                                        <th>RW {{ $rw }}</th>
                                    @endforeach
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach (range(1, 5) as $rw)
                                        <td>{{ $jumlahKKPerRW[$rw] }}</td>
                                    @endforeach
                                    <td>{{ $jumlahKK }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Section: Jumlah Penduduk per RW -->
            <div class="col-md-12 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk per RW</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    @foreach (range(1, 5) as $rw)
                                        <th>RW {{ $rw }}</th>
                                    @endforeach
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach (range(1, 5) as $rw)
                                        <td>{{ $jumlahPendudukPerRW[$rw] }}</td>
                                    @endforeach
                                    <td>{{ $jumlahPenduduk }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Section: Jumlah Penduduk berdasarkan Status -->
            <div class="col-md-12 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk berdasarkan Status</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aktif</td>
                                    <td>{{ $jumlahAktif }}</td>
                                </tr>
                                <tr>
                                    <td>Lahir</td>
                                    <td>{{ $jumlahLahir }}</td>
                                </tr>
                                <tr>
                                    <td>Masuk</td>
                                    <td>{{ $jumlahMasuk }}</td>
                                </tr>
                                <tr>
                                    <td>Meninggal</td>
                                    <td>{{ $jumlahMeninggal }}</td>
                                </tr>
                                <tr>
                                    <td>Keluar</td>
                                    <td>{{ $jumlahKeluar }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR DASHBOARD -->

    <style>
        .header {
            margin-bottom: 20px;
        }
        .admin-info span {
            display: block;
        }
        .card-title {
            margin: 0;
            font-size: 1.5rem;
        }
    </style>
@endsection
