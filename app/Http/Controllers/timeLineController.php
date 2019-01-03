<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Time_line;

use App\User;

use App\Project;

use App\lib\Jdf;

use Illuminate\Support\Facades\Session;

use validate;


class timeLineController extends Controller
{
    public function insert(Request $request){
 
        $this->validate($request,
        [
            'project_id' => 'required',
            'user_id' => 'required',                       
            'startTime' => 'required',                       
            'endTime' => 'required',                       
            'title' => 'required',
            'percent' => 'required',
        ]);
        // $jdf=new Jdf;
        // $jd = $jdf->tr_num($jdf->jdate('Y/n/j'));
        // echo $jd.' '.$request->startTime.'    '.$request->endTime;die;
        // if($request->startTime>$jd && $request->endTime>$jd) {
        //   $st = 1 ;  echo 'y';die; 
        // }
        // elseif($request->startTime<$jd && $request->endTime<$jd){
        //   $st = 2 ;  echo 'y';die;
        // }
        $one = new Time_line($request->all());
    	$one->save();
    	return redirect()->back()->with('success','ذخیره شد')->with('section','timeLine');
    }


    public function finished(Request $request){
    	$tl = timeLine::find($request->id);
    		$tl->status = 2;
    	$tl->update();
    	return redirect('project/timeLine')->with('success','ویرایش با موفقیت انجام شد');
    }

    public function delete(Request $request){
    	$one= Time_line::find($request->id);
    	if($one){
          $one->delete();
          return back()->with('success','حذف با موفقیت انجام شد')->with('section','timeLine'); 
    	}
    }
}
