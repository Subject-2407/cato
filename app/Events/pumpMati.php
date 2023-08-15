<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class pumpMati implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $terakhir_pump_mati;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($terakhir_pump_mati)
    {
        $this->terakhir_pump_mati = $terakhir_pump_mati;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('Aplatero');
    }
}
