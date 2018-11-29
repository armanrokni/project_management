<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Expertise;

class UserController extends Controller
{
  public function index(){

    return View('admin/userManagement/all' , ['users' => User::with('Expertise')->get()]);
  }

  public function insertView(){
    $expertise = Expertise::get();
    return View('admin.userManagement.insert',['expertises' => $expertise]);
  }

  public function insert(Request $request){

    $avatar = $request->file('avatar');
    $extension = $avatar->getClientOriginalExtension();
    $avatarname = time().'.'.$extension;
    $avatar->move(public_path().'/uploads/logos/', $avatarname);

    $request->merge(['access' => implode(',', (array) $request->get('access'))]);

    $user = new User($request->all());
    $user->avatar = 'uploads/logos/'.$avatarname;
    $user->password = 1234;
    $user->save();
    return redirect('admin/users');
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('admin.userManagement.edit', ['user'=> $user, 'expertises' => Expertise::get()]);
  }

  public function update(Request $request)
  {

    $user = User::find($request->id);
    if($request->hasfile('avatar')){
    $image = public_path($user->avatar);
    if (\File::exists($image)) {
      unlink($image);
    }

    $avatar = $request->file('avatar');
    $extension = $avatar->getClientOriginalExtension();
    $avatarname = time().'.'.$extension;
    $avatar->move(public_path().'/uploads/logos/', $avatarname);
    $user->avatar = 'uploads/logos/'.$avatarname;

    //$request->merge(['access' => implode(',', (array) $request->get('access'))]);

    }
  //echo  implode(',' , $request->access);die;
    $user->access = implode(',' , $request->access);
    $user->save();
    return redirect('admin/users');
  }

  public function delete($id)
      {
        $user = User::find($id);
        $image = public_path($user->avatar);
        if (\File::exists($image)) {
          unlink($image);
        }
        $user->delete();
        return redirect('admin/users');
      }


}
