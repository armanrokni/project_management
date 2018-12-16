<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'phone', 'expertise_id', 'access', 'avatar', 'lastLogin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    *send a password reset email to the users
    */
    public function SendPasswordResetNotification($token){
      $this->notify(new MailResetPassword($token));
    }

    public function Expertise(){
     return $this->belongsTo('App\Expertise');
   }
}
