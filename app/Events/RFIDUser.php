<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RFIDUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nis;
    public $nama;
    public $kelas;
    public $rfid;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nis,$nama,$kelas,$rfid)
    {
        $this->nis = $nis;
        $this->nama = $nama;
        $this->kelas = $kelas;
        $this->rfid = $rfid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('SMARD');
    }
}
