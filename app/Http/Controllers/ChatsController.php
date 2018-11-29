<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Message;
use App\User;
use \Auth;


// Including namespaces for broadcasting
use App\Events\MessageSent;
use App\Events\Update;
use App\Events\UserOnline;
use App\Events\UserOffline;




class ChatsController extends Controller
{

    public function index() { 

        return view('admin.chat');

    }


    public function users() 
    {

        $users = User::whereNotIn('id', [Auth::user()->id])->get();

        foreach($users as $index => $user) {

            $users[$index]['unseen'] = $user->messages()
                                        ->where('receiver', Auth::user()->id)
                                        ->where('seen', 0)
                                        ->count();

            $last_message = @$user->messages()
                                        ->where('receiver', Auth::user()->id)
                                        ->orWhere(array(['receiver', $user->id], ['user_id', Auth::user()->id]))
                                        ->orderBy('id', "DES")
                                        ->first()->message;

            $users[$index]['last_message'] = $last_message ? $last_message : '';

        }


        /* 
            Returns other users but not the user itself,
            including how many messages are unseen and the last message delivered
        */
        return $users->toJson();

    }


    // Fetching the messages between two users
    public function fetchMessages($receiver)
    {

        $where = array(
            array('user_id', Auth::user()->id),
            array('receiver', $receiver)
        );

        $orCondition = array(
            array('user_id', $receiver),
            array('receiver', Auth::user()->id)
        );

        // Fetching the last 100 messages 
        return array_reverse(
            Message::with('user')
                ->where($where)
                ->OrWhere($orCondition)
                ->orderBy('id', "DESC")
                ->take(100)
                ->get()
                ->toJson()
        );

    }

    public function seen(Request $request, $id) 
    {

        $messages = Message::where('receiver', Auth::user()->id)->get();

        foreach($messages as $message ) {

            $message->seen = 1;
            $message->save();

        }   

    }

    public function sendMessage(Request $request)
    {

        // $user = Auth::user();
        // $user = User::where('id', $user->id)->first();

        $user = Auth::user();

        $message = $user->messages()->create([
            'message'       => $request->input('message'),
            'receiver'      => $request->input('receiver')
        ]);


        // Broadcasting new messages to other users to update
        broadcast(new MessageSent($user, $message))->toOthers();
        broadcast(new Update($user, $message))->toOthers();

        // return ['status' => 'Message Sent!'];

    }

    public function online(User $user) {

        $user->status = 1;
        $user->save();

        // Broadcasting user status to other users when logging in and online
        broadcast(new \App\Events\UserOnline($user))->toOthers();

    }


    public function offline(User $user) {

        $user->status = 0;
        $user->save();

        // Broadcasting user status to other users when logged out and offline
        broadcast(new \App\Events\UserOffline($user))->toOthers();

    }


    
}
