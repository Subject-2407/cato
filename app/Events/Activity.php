<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Activity implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_id;
    public $name;
    public $type;
    public $description;
    public $time;
    public $instanceCode;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id,$name,$type,$description,$time,$instanceCode)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->time = $time;
        $this->instanceCode = $instanceCode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('instance.'.$this->instanceCode);
    }
}
