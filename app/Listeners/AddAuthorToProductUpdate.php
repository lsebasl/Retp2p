<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddAuthorToProductUpdate implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  ProductUpdate $event
     * @return void
     */
    public function handle(ProductUpdate $event)
    {
        $product = $event->product;
        $product->updated_by = $event->author->id;

        $product->save();
    }
}
