@extends('Component.bootstrap')
@section('title', $info['title'])
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Dashboard</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Kartu Keluarga</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahKK }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Total</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahPenduduk }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Aktif</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahAktif }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Meninggal</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahMeninggal }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Masuk</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahMasuk }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Keluar</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahKeluar }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Jumlah Penduduk Lahir</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jumlahLahir }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection