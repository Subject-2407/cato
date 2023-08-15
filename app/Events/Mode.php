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

class Mode implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $mode;

    public function __construct($mode)
    {
        $this->mode = $mode;
        $komponen = Komponen::find(1);
        $komponen->mode = $mode;
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