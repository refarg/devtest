<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\barang;
use App\pembelian;
use Illuminate\Support\Facades\DB;

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
  $totalbarang = barang::count();
  $totalbeli = pembelian::count();
  $beli = pembelian::all();
  $barang = DB::table('barang')
            ->select(DB::raw('SUM(stok) as totalstok, SUM(hargabarang) as totalharga'))
            ->first();
  $pembelian = pembelian::where('buktibayar','!=','')->where('statusverif','=',0)->get()->count();
  $money=DB::table('pembelian')
        ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
        ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
        ->select(DB::raw('SUM(jumlahbarang*hargabarang) as total'))
        ->where('pembelian.statusverif','=',1)
        ->first();
  return view('homeadmin', compact('totalbarang','totalbeli','beli','barang','pembelian','money'));
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
