<?php

namespace App\Events;

use App\Product;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductUpdate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $author;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     * @param User    $author
     */
    public function __construct(Product $product, User $author)
    {
        $this->product = $product;
        $this->author = $author;
    }
}
