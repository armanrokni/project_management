<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectmanagement extends Model
{
    protected $table= 'project_managment';

    protected $fillable= ['userId','projectId'];

    public $timestamps=false;

    public function userInfo(){

    	return $this->belongsTo('App\User','userId');
    }

    public function projectInfo(){

    	return $this->belongsTo('App\User','projectId');
    }
}
