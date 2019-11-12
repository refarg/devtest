<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Illuminate\Support\Facades\DB;
use App\pembelian;

class featureController extends Controller
{
  public function search(Request $request)
{
  $check = DB::table('barang')
          ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
          ->select('barang.*', 'jenisbarang.*')
          ->when($request->nama, function ($query) use ($request) {
              $query->where('namabarang', 'like', "%{$request->nama}%");
          });
  $tampil = $check->paginate(6);

  $tampil->appends($request->only('nama'));
  $recom = DB::table('barang')
          ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
          ->join('checkout', 'checkout.idbarang', '=', 'barang.idbarang')
          ->select('barang.*','jenisbarang.*', DB::raw('count(checkout.idbarang) as hitung'))
          ->groupBy('checkout.idbarang')
          ->orderBy('hitung','desc')
          ->take(5)->get();
  return view('viewbarangm', compact('tampil', 'recom'));
}

public function recommend(Request $request)
{
$see = DB::table('barang')
        ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
        ->join('checkout', 'checkout.idbarang', '=', 'barang.idbarang')
        ->select('barang.*','jenisbarang.*', DB::raw('count(checkout.idbarang) as hitung'))
        ->groupBy('checkout.idbarang')
        ->orderBy('hitung','desc')
        ->take(5);
$tampil = $see->paginate();

//$tampil->appends($request->only('nama'));
//dd($tampil);
return view('viewbarangm', compact('tampil'));
}
}
