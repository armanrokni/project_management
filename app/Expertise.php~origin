<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
  protected $table = 'expertises';

  protected $fillable = [
      'title',
  ];

  public function User(){
       return $this->hasMany('App\User');
   }
}
