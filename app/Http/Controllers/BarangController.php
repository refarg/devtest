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
use App\pembelian;
use User;

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

public function beliBarang(Request $request){
  $insert = ([
        'idbarang' => $request->idbarang,
        'iduser' => Auth::user()->id,
        'jumlahbarang' => $request->jumlahbarang,
        ]);
        pembelian::create($insert);

$sto = barang::select('idbarang','stok')
->where('idbarang','=',$request->idbarang)
->first();
        $edit =barang::find($request->idbarang);
        $edit->stok= $sto->stok - $request->jumlahbarang;
        $edit->save();
        return redirect('viewbarangm');

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


public function viewBeliadmin(Request $request){
      //$tampil= pembelian::all();
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->select('pembelian.*', 'barang.*', 'users.*')
            ->get();
      return view('daftarbeli',compact('tampil'));
}

public function viewBeliuser(Request $request){
      //$tampil= pembelian::all();
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->select('pembelian.*', 'barang.*', 'users.*')
            ->where('pembelian.iduser','=',Auth::user()->id)
            ->get();
      return view('daftarbeli',compact('tampil'));
}

  public function viewBarang(Request $request){
        $tampil= barang::all();
        return view('viewbarang',compact('tampil'));
  }
  public function viewBarangmod(Request $request){
        $tampil= barang::all();
        return view('viewbarangmod',compact('tampil'));
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
