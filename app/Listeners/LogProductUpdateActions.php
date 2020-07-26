<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogProductUpdateActions implements ShouldQueue
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
     * @param ProductUpdate $event
     * @return void
     */
    public function handle(ProductUpdate $event)
    {
        $product = $event->product;
        $author = $event->author;

        Log::info('product update', ['product' => $product->toArray(), 'author' => $author->toArray(), 'date' => now()]);

    }
}
