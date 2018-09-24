<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Auth;
use App\barang;

class BarangController extends Controller
{
  public function redir() {
  return view('registbarang');
  }

  public function insertBarang(Request $request){
    $insert = ([
    			'namabarang' => $request->namabarang,
    			'jenisbarang' => $request->jenisbarang,
    			'deskripsi' => $request->deskripsi,
    			'stok' => $request->stok,
    			'hargabarang' => $request->hargabarang,

    			]);
    		barang::create($insert);
        return view('welcome');
  }

  public function viewBarang(Request $request){
        $tampil= barang::all();
        return view('viewbarang',compact('tampil'));
  }

  public function viewBarangUser(Request $request){
        $tampil= barang::all();
        return view('viewbarangm',compact('tampil'));
  }

  public function geteditBarang($id){
        $edit= barang::find($id);
        return view('editbarang',compact('edit'));
  }

  public function editBarang(Request $request, $id){
    $edit=barang::find($id);
		$edit->namabarang= $request->namabarang;
		$edit->jenisbarang= $request->jenisbarang;
		$edit->deskripsi= $request->deskripsi;
    $edit->stok= $request->stok;
    $edit->hargabarang= $request->hargabarang;
		$edit->save();
    return redirect('viewbarang');
  }
}
