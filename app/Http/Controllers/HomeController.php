<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\barang;
use App\pembelian;
use Illuminate\Support\Facades\DB;
use App\checkout;

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
  $totalbeli = checkout::count();
  // $beli = checkout::all();
  $barang = DB::table('barang')
            ->select(DB::raw('SUM(stok) as totalstok, SUM(hargabarang) as totalharga'))
            ->first();
  $pembelian = DB::table('checkout')->join('buktitransfer', 'buktitransfer.idcheckout', '=', 'checkout.idpembelian')->where('buktitransfer','!=','')->where('statusverif','=',0)->get()->count();
  $money=DB::table('checkout')
        ->join('barang', 'checkout.idbarang', '=', 'barang.idbarang')
        ->join('buktitransfer', 'buktitransfer.idcheckout', '=', 'checkout.idpembelian')
        ->join('detailuser', 'checkout.iduser', '=', 'detailuser.iduser')
        ->select(DB::raw('SUM(jumlahbarang*hargabarang) as total'))
        ->where('buktitransfer.statusverif','=',1)
        ->first();
  return view('homeadmin', compact('totalbarang','barang','totalbeli','pembelian','money'));
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
