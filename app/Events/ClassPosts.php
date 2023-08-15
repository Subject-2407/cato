<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClassPosts implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $postId;
    public $posterName;
    public $posterProfile;
    public $caption;
    public $createdAt;
    public $instanceCode;
    public $classId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($postId,$posterName,$posterProfile,$caption,$createdAt,$instanceCode,$classId)
    {
        $this->$postId = $postId;
        $this->posterName = $posterName;
        $this->posterProfile = $posterProfile;
        $this->caption = $caption;
        $this->createdAt = $createdAt;
        $this->instanceCode = $instanceCode;
        $this->classId = $classId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('instance.'.$this->instanceCode.'.class.'.$this->classId);
    }
}
