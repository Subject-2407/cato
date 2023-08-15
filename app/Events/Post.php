<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Post implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $posterId;
    public $caption;
    public $dataId;
    public $posterName;
    public $posterProfile;
    public $media;
    public $createdAt;
    public $instanceCode;

    public function __construct($posterId,$caption,$dataId,$posterName,$posterProfile,$media,$createdAt,$instanceCode)
    {
        $this->posterId = $posterId;
        $this->caption = $caption;
        $this->dataId = $dataId;
        $this->posterName = $posterName;
        $this->posterProfile = $posterProfile;
        $this->media = $media;
        $this->createdAt = $createdAt;
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