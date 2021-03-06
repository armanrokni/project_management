<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Projectmanagement;
use App\Project;
use App\User;
use App\File;
use App\Report;
use App\Time_line;
use App\lib\Jdf;
use Illuminate\Support\Facades\Storage;
use validate;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller

{
    public function index()
    {
      $check = User::find(\Auth::user()->id);
      if($check->Role == 'admin'){
           $projects = Project::paginate(20);
           return View('admin.project',['project'=>$projects]);
      } elseif($check->Role == 'user'){
            $projects = Project::whereHas('pm', function($pm){
                $pm->where('userId', \Auth::user()->id);
            })->paginate(20);
            return View('admin.project',['project'=>$projects]);
      }
    }

    public function insert(Request $request){

    	$this->validate($request,
      	[
      		'title'=> 'required',
			    'startTime'=> 'required',
    			'endTime'=> 'required',
    			'customer'=> 'required',
    			'price'=> 'required',
      	]);
      	$pro=new Project($request->all());
            $pro->status=1;
      	        $pro->save();
      	return redirect()->back()->with('success','ذخیره شد');
    }


    public function edit(Request $request){

    	$one= Project::find($request->id);
    	if($one){
    		return View('admin.project_edit',['one'=>$one]);
    	}
    }


    public function update(Request $request){

    	$this->validate($request,
      	[
      		'title'=> 'required',
    			'startTime'=> 'required',
    			'endTime'=> 'required',
    			'status'=> 'required',
    			'customer'=> 'required',
    			'price'=> 'required',
      	]);

    	$one=Project::find($request->id);
    		$one->title = $request->title;
    		$one->startTime = $request->startTime;
    		$one->endTime = $request->endTime;
    		$one->status = $request->status;
    		$one->customer = $request->customer; //status=0->پایان یافته    status=1->در حال انجام
    		$one->price = $request->price;
    	$one->update();
    	return redirect('project')->with('success','ویرایش با موفقیت انجام شد');

    }


    public function delete(Request $request){

    	$one= Project::find($request->id);
    	if($one){
            $one->delete();
          return back()->with('success','حذف با موفقیت انجام شد');
    	}
    }

    public function showInfo(Request $request){

        $check = User::find(\Auth::user()->id);

        if($check->Role == 'admin'){
            $user = User::get();
            $file = File::where('project_id',$request->id)->get();
            $project = Project::with(['pm' => function($pm){
                $pm->with('userInfo');
            }])->find($request->id);
            // echo $project;die;
            $report = Report::where('project_id',$request->id)->with('userInfo')->get();
            $timeLine = Time_line::where('project_id',$request->id)->with('userInfo')->get();
            return View('admin.projectInfo', ['project'=>$project ,'user'=>$user, 'report'=>$report, 'timeLine'=>$timeLine, 'file'=>$file]);
      } elseif($check->Role == 'user'){
          $file = File::where('project_id',$request->id)->get();
          $timeLine = Time_line::where('project_id',$request->id)->with('userInfo')->get();
          $project = Project::find($request->id);
          $report = Report::where(['user_id' => \Auth::user()->id, 'project_id' => $request->id])->get();
          // return response()->json(['data' => $report]);
          return View('admin.projectInfo', ['project'=>$project, 'report'=>$report, 'timeLine'=>$timeLine, 'file'=>$file]);

      }
    }

  }
