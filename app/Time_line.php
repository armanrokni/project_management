<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_line extends Model
{
	protected $table='time_lines';

    protected $fillable= ['id','project_id','user_id','status','startTime','endTime','title','percent'];

    public $timestamps=false;


    public function userInfo(){
    	return $this->belongsTo('App\User','user_id');
    }

}

