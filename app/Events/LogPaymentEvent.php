<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogPaymentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ip;
    public $type;
    public $message;
    public $invoice;
    public $payment;
    public $userAgent;

    /**
     * Create a new event instance.
     *
     * @param $message
     * @param $payment
     * @param $invoice
     * @param $ip
     * @param $userAgent
     * @param $type
     */
    public function __construct($message, $payment, $invoice, $ip, $userAgent, $type)
    {
        $this->ip = $ip;
        $this->type = $type;
        $this->payment = $payment;
        $this->message = $message;
        $this->invoice = $invoice;
        $this->userAgent = $userAgent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

}
