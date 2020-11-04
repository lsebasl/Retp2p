<?php

namespace App\Listeners;

use App\Events\LogInvoiceEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogInvoiceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param LogInvoiceEvent $event
     * @return void
     */
    public function handle(LogInvoiceEvent $event)
    {
        if ($event->type === 'info') {
            Log::info($event->message, [
                'option' => $event->option
                ]);
        }
        if ($event->type === 'error') {
            Log::error($event->message, [
                'option' => $event->option
            ]);
        }
        if ($event->type === 'alert') {
            Log::alert($event->message, [
                'option' => $event->option
            ]);
        }
    }
}
