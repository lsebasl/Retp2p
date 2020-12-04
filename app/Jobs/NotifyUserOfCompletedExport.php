<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Notifications\ReportReady;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $filePath;
    public $user;

    public function __construct($filePath, $user)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    public function handle()
    {
        $this->user->notify(new ReportReady($this->filePath));
    }
}
