<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Expertise;
use App\lib\Jdf;

class UserController extends Controller
{
  public function index(){

    return View('admin/userManagement/all' , ['users' => User::with('Expertise')->get()]);
  }



  public function insert(Request $request){
    \Validator::make($request->all(), [
      'fullname' => 'required|max:255',
      'phone' => 'required|numeric',
      'email' => 'required|e-mail',
      'avatar' => 'required|image',
      'lastLogin' => 'nullable',
      'access[]' => 'nullable'
    ])->validate();

    $avatar = $request->file('avatar');
    $extension = $avatar->getClientOriginalExtension();
    $avatarname = time().'.'.$extension;
    $avatar->move(public_path().'/uploads/logos/', $avatarname);

    $request->merge(['access' => implode(',', (array) $request->get('access'))]);

    $user = new User($request->all());
    $user->avatar = 'uploads/logos/'.$avatarname;
    $user->password = \Hash::make('1234');
    $user->save();
    return redirect('admin/users');
  }

  public function insertView(){
    $expertise = Expertise::get();
    return View('admin.userManagement.insert',['expertises' => $expertise]);
  }

  public function edit($id)
  {
    $user = User::find($id);
    $access = explode(',' , $user->access);
    return view('admin.userManagement.edit', ['user'=> $user, 'expertises' => Expertise::get() , 'access' => $access]);
  }

  public function update(Request $request)
  {
    \Validator::make($request->all(), [
      'fullname' => 'required|max:255',
      'phone' => 'required|numeric',
      'email' => 'required|e-mail',
      'avatar' => 'image',
      'lastLogin' => 'nullable',
      'access[]' => 'nullable'
    ])->validate();

    $user = User::find($request->id);
    $user->fullname=$request->get('fullname');
    $user->phone=$request->get('phone');
    $user->email=$request->get('email');
    $user->lastLogin=$request->get('lastLogin');

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
    // print_r($request->access);die;
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
