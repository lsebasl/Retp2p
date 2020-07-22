<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductSaveImage;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeProductImage
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
     * @param ProductSaveImage $event
     * @param Product $product
     * @return void
     */
    public function handle(ProductSaveImage $event)
    {
        $image= Image::make(Storage::get($event->product->image))
            ->widen(600)
            ->encode();

        Storage::put($event->product->image, (string) $image);

    }
}
