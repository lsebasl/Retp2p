<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogProductActions implements ShouldQueue
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
     * @param  ProductCreated $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        $product = $event->product;
        $author = $event->author;

        Log::info('product created', ['product' => $product->toArray(), 'author' => $author->toArray(), 'date' => now()]);

    }
}
