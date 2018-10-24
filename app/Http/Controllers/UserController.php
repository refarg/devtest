<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Auth;
use App\detailuser;
use App\pembelian;

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
    $edit = detailuser::where('iduser','=',$id)->first();
    $beli = pembelian::where('iduser','=',$id)->where('statusverif','=','0')->get();
    //dd($beli);
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
        $orname = $request->file('avatar')->getClientOriginalName();
        $filename = pathinfo($orname, PATHINFO_FILENAME);
        $ext = $request->file('avatar')->getClientOriginalExtension();
        $tgl = Carbon::now()->format('dmYHis');
        $newname = $filename . $tgl . "." . $ext;
        $edit->avatar = $newname;
        $request->file('avatar')->move("profileimage/", $newname);
          }
        //dd($edit);
    if(Auth::User()->level==2 and count($beli)==0){
      $edit->update();
      return redirect('viewuser');
    }
    else{
      return redirect('forbidden');
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
