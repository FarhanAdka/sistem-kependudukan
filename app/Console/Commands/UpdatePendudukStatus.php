<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Penduduk;
use Carbon\Carbon;

class UpdatePendudukStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penduduk:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of Penduduk from lahir to aktif if their birth date is one year or more ago';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $penduduk = Penduduk::where('status', 'lahir')
                            ->whereDate('tanggal_lahir', '<=', Carbon::now()->subYear())
                            ->get();

        foreach ($penduduk as $p) {
            $p->status = 'aktif';
            $p->save();
        }

        $this->info('Status updated successfully.');
        return 0;
    }
}

