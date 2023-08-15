<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Komponen;

class Kipas implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $kipas;

    public function __construct($kipas)
    {
        $this->kipas = $kipas;
        $komponen = Komponen::find(1);
        $komponen->kipas = $kipas;
        $komponen->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('Component');
    }
}