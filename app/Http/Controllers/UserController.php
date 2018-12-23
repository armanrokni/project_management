<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\User;

use App\Projectmanagement;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function insert(Request $request){

        $this->validate($request,
        [
            'projectId' => 'required',
            'userId' => 'required',                       
        ]);
        $p = Projectmanagement::where(['userId' => $request->userId, 'projectId'=> $request->projectId])->count();
        if($p == 1){
            return back()->with('success','این کاربر قبلا ثبت شده است')->with('session','user');
        }else{
            $proMng=new Projectmanagement($request->all());
            $proMng->save();  
            return back()->with('success','درج با موفقیت انجام شد')->with('session','user'); 
        }    
    }

    public function deleteUser(Request $request){

        $proMng = Projectmanagement::where(['userId' => $request->user_id, 'projectId' => $request->project_id])->delete();
        if($proMng){
        return back()->with('success','حذف با موفقیت انجام شد')->with('session','user'); 
        }

    }
}
