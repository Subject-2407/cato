<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\PlantMoisture;

class Aplatero implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $kelembapan;
    public $pump;
    public $mode;
    public $terakhir_pump_hidup;
    public $terakhir_pump_mati;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($kelembapan,$pump,$mode,$terakhir_pump_hidup,$terakhir_pump_mati)
    {
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
