<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Enable username only login
    /*
     public function username(){
       return 'name';
     }
     */

    // Enable email or username login.
    // To revert back to email login, just comment the method below
    // and change the 'name' form into 'email' on login view
    public function username()
    {
      $login = request()->input('name');
      $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
      request()->merge([$field => $login]);
      return $field;
    }


}
