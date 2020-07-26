<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class AddAuthorToProduct implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param ProductCreated $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        $product = $event->product;
        $product->created_by = $event->author->id;

        $product->save();
    }
}
