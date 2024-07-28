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
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Kartu Keluarga</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahKK }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Total</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahPenduduk }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Aktif</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahAktif }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Meninggal</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahMeninggal }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Masuk</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahMasuk }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Keluar</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahKeluar }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light h-100">
                    <div class="card-header">Jumlah Penduduk Lahir</div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h5 class="card-title">{{ $jumlahLahir }}</h5>
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
