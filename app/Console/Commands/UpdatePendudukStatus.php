<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Penduduk;
use Carbon\Carbon;
use App\Services\UpdatePendudukStatusService;

class UpdatePendudukStatus extends Command
{
    protected $signature = 'penduduk:update-status';
    protected $description = 'Update status of Penduduk based on certain conditions';
    protected $updatePendudukStatusService;

    public function __construct(UpdatePendudukStatusService $updatePendudukStatusService)
    {
        parent::__construct();
        $this->updatePendudukStatusService = $updatePendudukStatusService;
    }

    public function handle()
    {
        $message = $this->updatePendudukStatusService->updateStatus();
        $this->info($message);
        return 0;
    }
}

