<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Expertise;

class ProfileController extends Controller
{
  public function index(){
    $profile = User::find(Auth::id());
    // print_r($profile);
      return View('profile', ['profile' => $profile, 'profiles' => Expertise::get()]);
  }

  public function update(Request $request)
  {
    \Validator::make($request->all(), [
      'fullname' => 'required|max:255',
      'phone' => 'required|numeric',
      'email' => 'required|e-mail',
      'avatar' => 'image'
    ])->validate();
    $profile = User::find(Auth::id());
    $profile->fullname=$request->get('fullname');
    $profile->phone=$request->get('phone');
    $profile->email=$request->get('email');
    $profile->password= \Hash::make($request->get('password'));
    $profile->lastLogin=$request->get('lastLogin');

    if($request->hasfile('avatar')){
      $image = public_path($profile->avatar);
        if (\File::exists($image)) {
            unlink($image);
        }

      $avatar = $request->file('avatar');
      $extension = $avatar->getClientOriginalExtension();
      $avatarname = time().'.'.$extension;
      $avatar->move(public_path().'/uploads/logos/', $avatarname);
      $profile->avatar = 'uploads/logos/'.$avatarname;
    }

    $profile->save();
    return redirect('profile');
  }
}
