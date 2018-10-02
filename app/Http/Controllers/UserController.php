<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Auth;
use App\detailuser;

class UserController extends Controller
{
  public function viewProfil() {
    //$edit= user::find($id);
    $edit=DB::table('users')
          ->join('detailuser', 'detailuser.iduser', '=', 'users.id')
          ->select('detailuser.*','users.*')
          ->where('detailuser.iduser','=',Auth::user()->id)
          ->first();
  return view('edituser',compact('edit'));
  }

  public function editGlobal($id) {
    //$edit= user::find($id);
    $edit=DB::table('users')
          ->join('detailuser', 'detailuser.iduser', '=', 'users.id')
          ->select('detailuser.*','users.*')
          ->where('detailuser.iduser','=',$id)
          ->first();
  return view('edituser',compact('edit'));
  }

  public function viewAll() {
    //$edit= user::find($id);
    $edit=DB::table('users')
          ->join('detailuser', 'detailuser.iduser', '=', 'users.id')
          ->select('detailuser.*','users.*')
          ->get();
  return view('viewuserlistmod',compact('edit'));
  }

  public function validator(Request $request)
  {
      $rules = [
        'namalengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'nomorponsel' => 'required|digits_between:10,13',
        'avatar' => 'mimes:jpeg,bmp,png',
      ];
      return Validator::make($request->all(), $rules);
  }

  public function updateProfile(Request $request, $id){
    $edit = detailuser::all()->where('iduser',$id)->first();
    $validator = $this->validator($request);
    if($validator->passes())
    {
        $edit->namalengkap = $request->namalengkap;
        $edit->alamat = $request->alamat;
        $edit->nomorponsel = $request->nomorponsel;
        if($request->file('avatar')==""){
          $request->avatar = $request->avatar;
        }
        else{
        $file       = $request->file('avatar');
        $fileName   = $file->getClientOriginalName();
        $request->file('avatar')->move("profileimage/", $fileName);
        $edit->avatar = $request->file('avatar')->getClientOriginalName();
          }
        //dd($edit);
    $edit->update();
    if (Auth::user()->level==1) {
      return redirect('viewuserlist');
    }
    else{
      return redirect('viewuser');
    }
    }
    else
    {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }
  }
}
