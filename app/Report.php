<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table= 'reports';

    protected $fillable= ['id','user_id','project_id','createdAt','description'];

	public $timestamps=false;

	public function userInfo(){

		return $this->belongsTo('App\User','user_id');
	}

}
