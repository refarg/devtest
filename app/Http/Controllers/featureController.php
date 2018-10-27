<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Illuminate\Support\Facades\DB;

class featureController extends Controller
{
  public function paginate(Request $request)
{
  $anu = DB::table('barang')
          ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
          ->select('barang.*', 'jenisbarang.*')
          ->when($request->nama, function ($query) use ($request) {
              $query->where('namabarang', 'like', "%{$request->nama}%")
              ->orWhere('deskripsi', 'like', "%{$request->nama}%")
              ->orWhere('jenisbarang', 'like', "%{$request->nama}%");
          });
  $tampil = $anu->paginate(2);

  $tampil->appends($request->only('nama'));
  //dd($tampil);
  return view('viewbarangm', compact('tampil'));
}
}
