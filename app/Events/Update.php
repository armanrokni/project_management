<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;
use App\Message;


class Update implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $message;
    public $users;


    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;

        $receiver = $this->message->receiver;
        $users = User::whereNotIn('id', [$receiver])->get();

        foreach($users as $index => $user) {

            $users[$index]['unseen'] = $user->messages()
                        ->where('receiver', $receiver)
                        ->where('seen', 0)
                        ->count();

            $last_message = $user->messages()
                        ->where('receiver',  $receiver)
                        ->orWhere(array(['receiver', $user->id], ['user_id',  $receiver]))
                        ->orderBy('id', "DES")
                        ->first()->message;

            $users[$index]['last_message'] = $last_message ? $last_message : '';

        }


        $this->users = $users->toArray();

    }


    public function broadcastOn()
    {
        return new PrivateChannel('user.update-' . $this->message->receiver);
    }
}
