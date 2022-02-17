<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;



class MessageCreated //implements ShouldBroadcast //MessageCreated = createEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
     public $post;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user , $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new channel(name: 'post');
         return new PrivateChannel('channel-name');
    }
}
