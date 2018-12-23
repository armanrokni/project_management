<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use validate;
use Illuminate\Support\Facades\Session;

class ReportsController extends Controller
{
    public function insert(Request $request){
        $this->validate($request,
        [
            'user_id' => 'required',
            'project_id' => 'required',
            'description' =>'required',
        ]);
        $report =new Report($request->all());
            $report->createdAt = time();
            $report->save();

        return redirect()->back()->with('success','ذخیره شد')->with('section','reports');
    }

    public function delete(Request $request){
    	$one= Report::find($request->id);
    	if($one){
          $one->delete();
          return back()->with('success','حذف با موفقیت انجام شد')->with('section','reports');
    	}
    }
}
