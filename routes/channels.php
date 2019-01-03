<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('user.{receiver_id}-{userId}', function ($user, $receiver_id, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('user.update', function ($user) {
    return true;
});

Broadcast::channel('chat', function ($user) {
    return $user;
});