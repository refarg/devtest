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
use App\jenisbarang;
use App\KomentarBarang;
use App\replykomentarbarang;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\detailuser;

class BarangController extends Controller
{
  public function redir() {
    $disp=DB::table('jenisbarang')
          ->select('jenisbarang.*')
          ->get();
  return view('registbarang', compact('disp'));
  }

  public function insertBarang(Request $request){
    $validator = $this->validator($request);
    if($validator->passes())
    {

      $orname = $request->file('gambarbarang')->getClientOriginalName();
      $filename = pathinfo($orname, PATHINFO_FILENAME);
      $ext = $request->file('gambarbarang')->getClientOriginalExtension();
      $tgl = Carbon::now()->format('dmYHis');
      $newname = $filename . $tgl . "." . $ext;
      $request->file('gambarbarang')->move("image/", $newname);

      $insert = ([
            'namabarang' => $request->namabarang,
            'idjenis' => $request->jenisbarang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'hargabarang' => $request->hargabarang,
            'gambarbarang' => $newname,
            ]);

    //dd($insert);
          barang::create($insert);
          return redirect('viewbarangmod');
    }
    else
    {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }

}

public function getbeli(Request $request, $id){
  $barang = barang::where('idbarang','=',$id)->first();
  $detuser = detailuser::where('iduser','=',Auth::User()->id)->first();

  if(Auth::User()->level!=1){
  return view('lanjutbeli', compact('barang','detuser'));
  }
  else{
  return redirect('home');
  }
}

public function validatorbeli(Request $request)
{
    $rules = [
      'namalengkap' => 'required',
      'alamat' => 'required',
      'nomortelepon' => 'required',
    ];
    return Validator::make($request->all(), $rules);
}

public function beliBarang(Request $request, $id){
  $validator = $this->validatorbeli($request);
    if($validator->passes()){
  $insert = ([
        'idbarang' => $id,
        'iduser' => Auth::user()->id,
        'jumlahbarang' => $request->jumlahbarang,
        'statusverif' => 0 ,
        'buktibayar' => '',
        ]);
  //dd($insert);
        pembelian::create($insert);

$sto = barang::select('idbarang','stok')
->where('idbarang','=',$id)
->first();
        $edit =barang::find($id);
        $edit->stok= $sto->stok - $request->jumlahbarang;
        //dd($insert, $sto);
        $edit->save();
        return redirect('viewbarang');
      }
      else{
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
      }
}

public function batalBeli(Request $request, $id){
        $edit= pembelian::find($id);
        $stokbeli = $edit->jumlahbarang;
        $idbarang = $edit->idbarang;
        $update = barang::find($idbarang);
        $update->stok = $update->stok + $stokbeli;
        $update->save();
        $edit->delete();
  return redirect('listbeli');
}

public function batalBelimod(Request $request, $id){
        $edit= pembelian::find($id);
        $stokbeli = $edit->jumlahbarang;
        $idbarang = $edit->idbarang;
        $update = barang::find($idbarang);
        $update->stok = $update->stok + $stokbeli;
        $update->save();
        $edit->delete();
  return redirect('listpembelian');
}

public function validator(Request $request)
{
    $rules = [
      'namabarang' => 'required|string|max:255',
      'jenisbarang' => 'required|string|max:255',
      'deskripsi' => 'required|string|max:90',
      'stok' => 'required|integer|min:0',
      'hargabarang' => 'required|integer',
      'gambarbarang' => 'required|mimes:jpeg,bmp,png',
    ];
    return Validator::make($request->all(), $rules);
}


public function viewBeliadmin(Request $request){
      //$tampil= pembelian::all();
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
            ->select('pembelian.*', 'barang.*', 'users.name', 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->orderBy('pembelian.created_at', 'asc')
            ->get();
      return view('daftarbeli',compact('tampil'));
}

public function viewBeliuser(Request $request){
      //$tampil= pembelian::all();
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
            ->select('pembelian.*', 'barang.*', 'users.name' , 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where('pembelian.iduser','=',Auth::user()->id)
            ->orderBy('pembelian.created_at', 'asc')
            ->get();
      return view('daftarbeliuser',compact('tampil'));
}

public function viewdetBeli(Request $request, $idbeli){
      //$tampil= pembelian::all();
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
            ->select('pembelian.*', 'barang.*', 'users.name' , 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where('pembelian.idpembelian','=',$idbeli)
            ->first();
      if(Auth::user()->level==1 || Auth::user()->id==$tampil->iduser){
      return view('viewdetailbeli',compact('tampil'));
    }
    else{
      return redirect('home');
    }
}

  public function viewBarang(Request $request){
      $tampil=DB::table('barang')
              ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
              ->select('barang.*', 'jenisbarang.*')
              ->get();
        return view('viewbarang',compact('tampil'));
  }

  public function viewBarangUser(Request $request){
    $tampil=DB::table('barang')
            ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
            ->select('barang.*', 'jenisbarang.*')
            ->get();
    //dd($tampil);
        return view('viewbarangm',compact('tampil'));
  }

  public function viewBarangSatuan(Request $request,$id){
      $show=DB::table('barang')
              ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
              ->select('barang.*', 'jenisbarang.*')
              ->where('barang.idbarang','=',$id)
              ->first();
      $komeng=DB::table('komentarbarang')
              ->join('users','komentarbarang.iduser','=','users.id')
              ->select('komentarbarang.*', 'users.name')
              ->where('komentarbarang.idbarang','=',$id)
              ->get();
      $replykom=DB::table('replykomentarbarang')
              ->join('users','replykomentarbarang.iduser','=','users.id')
              ->join('komentarbarang','komentarbarang.idkomentar','=','replykomentarbarang.idkomentar')
              ->select('replykomentarbarang.*', 'users.name')
              ->where([['komentarbarang.idbarang','=',$id]])
              ->get();

              //dd($komeng, $replykom);
              //dd($show, $komeng, $replykom);
        return view('viewbarangsat',compact('show','komeng','replykom'));
  }


  public function sendBukti(Request $request, $bukti){
    $edit = pembelian::where('idpembelian','=',$bukti)->first();
    $orname = $request->file('buktipembayaran')->getClientOriginalName();
    $filename = pathinfo($orname, PATHINFO_FILENAME);
    $ext = $request->file('buktipembayaran')->getClientOriginalExtension();
    $tgl = Carbon::now()->format('dmYHis');
    $newname = $filename . $tgl . "." . $ext;
    $edit->buktibayar = $newname;
    $request->file('buktipembayaran')->move("buktitrf/", $newname);
    $edit->save();
          return Redirect::back();
  }

public function doverif(Request $request, $idbayar){
  $val = pembelian::find($idbayar);
  $val->statusverif = 1;
  $val->save();
  return Redirect::back();
}

  public function postkomen(Request $request, $id){
    $insert=([
          'idbarang' => $id,
          'iduser' => Auth::user()->id,
          'komentar' => $request->komentar,
          ]);

          KomentarBarang::create($insert);
          return Redirect::back();

  }

  public function hapuskom(Request $request, $id){
$del = KomentarBarang::find($id);
    if (Auth::user()->level==1 || Auth::user()->id==$del->iduser) {
    //dd($del);
    $del->delete();
          return Redirect::back();
}
  }

  public function editkomen(Request $request, $id){
    $edit = KomentarBarang::find($id);
    if (Auth::user()->id==$edit->iduser) {
    //dd($edit);
    $edit->komentar = $request->komentar;
    $edit->save();
          return Redirect::back();
    }
    else{
      return 'hayo';
    }
  }

  public function postreply(Request $request, $idkomen){
    $insert=([
          'idkomentar' => $idkomen,
          'iduser' => Auth::user()->id,
          'replykomentar' => $request->replykom,
          ]);
    //dd($insert);
          replykomentarbarang::create($insert);
          return Redirect::back();

  }

  public function hapusreply(Request $request, $id){
$del = replykomentarbarang::find($id);
    if (Auth::user()->level==1 || Auth::user()->id==$del->iduser) {
    //dd($del);
    $del->delete();
          return Redirect::back();
}
  }

  public function editreply(Request $request, $id){
    $edit = replykomentarbarang::find($id);
    if (Auth::user()->id==$edit->iduser) {
    //dd($edit);
    $edit->replykomentar = $request->replykomentar;
    $edit->save();
          return Redirect::back();
    }
    else{
      return 'hayo';
    }
  }

  public function viewBarangmod(Request $request){
    $tampil=DB::table('barang')
            ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
            ->select('barang.*', 'jenisbarang.*')
            ->get();
        return view('viewbarangmod',compact('tampil'));
  }

  public function hapusBarangmod($id){
        $edit= barang::find($id);
        $edit->delete();
        return redirect('viewbarangmod');
  }

  public function geteditBarang($id){
        $edit= barang::find($id);
        // $edit=DB::table('barang')
        //         ->join('jenisbarang', 'jenisbarang.idjenis', '=', 'barang.idjenis')
        //         ->select('barang.*')
        //         ->where('barang.idbarang','=',$id)
        //         ->get();
        //dd($edit);

         // $getjen=DB::table('jenisbarang')
         //       ->select('jenisbarang.*')
         //       ->where('jenisbarang.idjenis','=',$edit->idjenis)
         //       ->get();

         $getjen = jenisbarang::find($edit->idjenis);

         $disp=DB::table('jenisbarang')
               ->select('jenisbarang.*')
               ->get();

        //dd($getjen);
        //dd($edit , $disp, $getjen);
        return view('editbarang',compact('edit', 'disp' ,'getjen'));
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
      $edit->idjenis= $request->jenisbarang;
      $edit->deskripsi= $request->deskripsi;
      $edit->stok= $request->stok;
      $edit->hargabarang= $request->hargabarang;

      if($request->file('gambarbarang')==""){
        $edit->gambarbarang = $edit->gambarbarang;
      }

      else{

      $orname = $request->file('gambarbarang')->getClientOriginalName();
      $filename = pathinfo($orname, PATHINFO_FILENAME);
      $ext = $request->file('gambarbarang')->getClientOriginalExtension();
      $tgl = Carbon::now()->format('dmYHis');
      $newname = $filename . $tgl . "." . $ext;
      $request->file('gambarbarang')->move("image/", $newname);

      $edit->gambarbarang = $newname;
        }
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
