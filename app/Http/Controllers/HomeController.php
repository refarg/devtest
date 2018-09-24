<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
      if (Auth::User()->level=='1') {
//  $redirectTo = '/dashboardAgen';  // code...
  return view('homeadmin');
}else if(Auth::User()->level=='2') {
  //$redirectTo = '/dashboardPengusaha';
  return view ('homeuser');
  }
  else if(Auth::User()->level=='3') {
    //$redirectTo = '/dashboardPengusaha';
    return view ('dashboardAdmin');
    }

    }
}
