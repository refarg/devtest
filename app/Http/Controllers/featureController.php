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
              $query->where('namabarang', 'like', "%{$request->nama}%")
              ->orWhere('deskripsi', 'like', "%{$request->nama}%")
              ->orWhere('jenisbarang', 'like', "%{$request->nama}%");
          });
  $tampil = $check->paginate(6);

  $tampil->appends($request->only('nama'));
  //dd($tampil);
  return view('viewbarangm', compact('tampil'));
}

public function recommend(Request $request)
{
$see = DB::table('barang')
        ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
        ->join('pembelian', 'pembelian.idbarang', '=', 'barang.idbarang')
        ->select('barang.*','jenisbarang.*', DB::raw('count(pembelian.idbarang) as hitung'))
        ->groupBy('pembelian.idbarang')
        ->orderBy('hitung','desc')
        ->take(5)
        ;
$tampil = $see->paginate();

//$tampil->appends($request->only('nama'));
//dd($tampil);
return view('viewbarangm', compact('tampil'));
}
}
