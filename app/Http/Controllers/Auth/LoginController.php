<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function username()
    {
      return 'phone';
    }

    protected function redirectPath(){
      $user = \App\User::find(\Auth::user()->id);
      $user->update(['lastLogin' => time()]);
      if ($user->Role == 'admin'){
          return 'admin/users';
      } elseif ($user->Role == 'user'){
          return 'profile';
      }
    }

    public function customLogout(Request $request)
    {
        \Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('customLogout');
    }
}
