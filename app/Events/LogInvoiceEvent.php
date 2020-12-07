<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogInvoiceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type;
    public $message;
    public $option;

    /**
     * Create a new event instance.
     *
     * @param $type
     * @param $message
     * @param array $option
     */
    public function __construct($type, $message, $option = [])
    {
        $this->type = $type;
        $this->message = $message;
        $this->option = $option;
    }
}
