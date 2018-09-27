<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Auth;
use App\barang;
use App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Redirect;

class BarangController extends Controller
{
  public function redir() {
  return view('registbarang');
  }

  public function insertBarang(Request $request){
    $validator = $this->validator($request);
    if($validator->passes())
    {
    $insert = ([
    			'namabarang' => $request->namabarang,
    			'jenisbarang' => $request->jenisbarang,
    			'deskripsi' => $request->deskripsi,
    			'stok' => $request->stok,
    			'hargabarang' => $request->hargabarang,

    			]);
          barang::create($insert);
          return redirect('viewbarang');
    }
    else
    {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }

}

public function validator(Request $request)
{
    $rules = [
      'namabarang' => 'required|string|max:255',
      'jenisbarang' => 'required|string|max:255',
      'deskripsi' => 'required|string',
      'stok' => 'required|integer',
      'hargabarang' => 'required|integer',
    ];
    return Validator::make($request->all(), $rules);
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

  public function hapusBarang($id){
        $edit= barang::find($id);
        $edit->delete();
        return redirect('viewbarang');
  }

  public function editBarang(Request $request, $id){
    $edit=barang::find($id);
    $validator = $this->validator($request);
    if($validator->passes())
    {
      $edit->namabarang= $request->namabarang;
      $edit->jenisbarang= $request->jenisbarang;
      $edit->deskripsi= $request->deskripsi;
      $edit->stok= $request->stok;
      $edit->hargabarang= $request->hargabarang;
      $edit->save();
      return redirect('viewbarang');
    }
    else
    {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }

  }
}
