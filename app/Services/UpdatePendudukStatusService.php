<?php
namespace App\Services;

use App\Models\Penduduk;
use Carbon\Carbon;

class UpdatePendudukStatusService
{
    public function updateStatus()
    {
        // Update status 'lahir' to 'aktif'
        $pendudukLahir = Penduduk::where('status', 'lahir')
                                ->whereDate('tanggal_lahir', '<=', Carbon::now()->subYear())
                                ->get();

        foreach ($pendudukLahir as $p) {
            $p->status = 'aktif';
            $p->save();
        }

        // Update status 'masuk' to 'aktif'
        $pendudukMasuk = Penduduk::where('status', 'masuk')
                                ->whereDate('created_at', '<=', Carbon::now()->subYear())
                                ->get();

        foreach ($pendudukMasuk as $p) {
            $p->status = 'aktif';
            $p->save();
        }

        return 'Status penduduk berhasil diupdate';
    }
}