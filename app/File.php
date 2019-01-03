<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table= 'files';

    protected $fillable= ['id','fileName','filePath','project_id'];

    public function project(){
    	return $this->belongsTo('App\Project,project_id');
    }
}
