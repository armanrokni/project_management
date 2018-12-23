<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table= 'projects';

    protected $fillable= ['title','startTime','endTime','status','customer','price'];

    public $timestamps=false;

    public function pm(){
    	return $this->hasMany('App\Projectmanagement', 'projectId');
    }
}
 