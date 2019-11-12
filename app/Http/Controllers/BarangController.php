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
use App\checkout;
use App\buktitransfer;

class BarangController extends Controller
{
  public function redir() {
    $disp=DB::table('jenisbarang')
          ->select('jenisbarang.*')
          ->get();
  return view('registbarang', compact('disp'));
  }

  // Fungsi CRUD Barang

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

  public function viewBarangmod(Request $request){
    $tampil=DB::table('barang')
            ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
            ->select('barang.*', 'jenisbarang.*')
            ->paginate(6);
        return view('viewbarangmod',compact('tampil'));
  }

  public function hapusBarangmod($id){
        $edit= barang::find($id);
        $edit->delete();
        return redirect('viewbarangmod');
  }

  public function geteditBarang($id){
        $edit= barang::find($id);

         $getjen = jenisbarang::find($edit->idjenis);

         $disp=DB::table('jenisbarang')
               ->select('jenisbarang.*')
               ->get();

        return view('editbarang',compact('edit', 'disp' ,'getjen'));
  }

  public function hapusBarang($id){
        $edit= barang::find($id);
        $edit->delete();
        return redirect('viewbarangm');
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



//Fungsi CRUD Pembelian + checkout + Insert bukti pembayaran

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

public function docheckout(Request $request){
if(empty($request->checko) && $request->jasapengiriman == null ){
  return Redirect::back();
}
else{
  $getbeli = pembelian::whereIn('idpembelian', json_decode('[' . implode(', ', $request->input('checko')) . ']', true))->where('iduser','=',Auth::User()->id)->get();
  // dd($getbeli);
  $getco = checkout::select('idpembelian')->orderBy('idpembelian', 'desc')->first();
  // dd($getco);
  if(is_null($getco)){
    $temp = 0+1;
  }
  else{
  $temp = $getco->idpembelian +1;
  }
  $getall = $getbeli->toArray();
  // dd($getall);

  foreach($getall as $input){
    $input['idpembelian'] = $temp;
    checkout::insert($input);
  }

  foreach($getbeli as $deletthis){
    $deletthis->delete();
  }

  $insert=([
        'idcheckout' => $temp,
        'buktitransfer' => 0,
        'jasapengiriman' => $request->jasapengiriman,
        'statusverif' => 0,
        'resi' => '',
        ]);

  buktitransfer::create($insert);
  return Redirect::back();
  }
}

public function batalcheckout(Request $request, $id){
if ($request->dlco!=null && $request->dlco==$id) {
  $getco = checkout::where('idpembelian', '=', $id)->get();
  foreach ($getco as $getco) {
    $editbarang = barang::where('idbarang','=',$getco->idbarang)->first();
    $editbarang->stok = $editbarang->stok + $getco->jumlahbarang;
    $editbarang->save();
  }
  $getco->delete();
  buktitransfer::where('idcheckout', '=', $id)->delete();
  return redirect('listcheckout');
  }
  else{
    return Redirect::back();
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

public function sendBukti(Request $request, $bukti){
  $edit = buktitransfer::where('idcheckout','=',$bukti)->first();
  $orname = $request->file('buktipembayaran')->getClientOriginalName();
  $filename = pathinfo($orname, PATHINFO_FILENAME);
  $ext = $request->file('buktipembayaran')->getClientOriginalExtension();
  $tgl = Carbon::now()->format('dmYHis');
  $newname = $filename . $tgl . "." . $ext;

  $request->file('buktipembayaran')->move("buktitrf/", $newname);
  $edit->buktitransfer = $newname;
  $edit->save();
        return Redirect::back();
}

public function viewCheckoutuser(Request $request){
      //$tampil= pembelian::all();
      $tampil=DB::table('checkout')
            ->join('barang', 'checkout.idbarang', '=', 'barang.idbarang')
            ->join('users', 'checkout.iduser', '=', 'users.id')
            ->join('buktitransfer', 'checkout.idpembelian', '=', 'buktitransfer.idcheckout')
            ->join('detailuser', 'checkout.iduser', '=', 'detailuser.iduser')
            ->select('checkout.*', 'barang.*', 'users.name' , 'detailuser.*', 'buktitransfer.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where('checkout.iduser','=',Auth::user()->id)
            ->orderBy('checkout.created_at', 'asc')
            ->paginate(10);

      return view('daftarcouser',compact('tampil'));
}

//Fungsi validasi pembelian dan update resi admin

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

public function updateResi(Request $request, $id){
  $beli = buktitransfer::where('idcheckout','=',$id)->first();
  $beli->resi = $request->nomorresi;
  $beli->save();
  return redirect('listpembelian');
}

public function doverif(Request $request, $idbayar){
$val = buktitransfer::where('idcheckout','=',$idbayar)->get();
foreach($val as $val){
$val->statusverif = 1;
$val->save();
}
return Redirect::back();
}

//Fungsi CRUD komentarbarang

public function commentrules(Request $request){
    $rules = [
      'komentar' => 'required',
      'g-recaptcha-response'=>'required|recaptcha'
    ];
    return Validator::make($request->all(), $rules);
}

  public function postkomen(Request $request, $id){
    $validator = $this->commentrules($request);
      if($validator->passes()){
        $insert=([
          'idbarang' => $id,
          'iduser' => Auth::user()->id,
          'komentar' => $request->komentar,
          ]);

          KomentarBarang::create($insert);
          return Redirect::back();
    }
    else
    {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }

  }

  public function hapuskom(Request $request, $id){
$del = KomentarBarang::find($id);
    if (Auth::user()->level==1 || Auth::user()->id==$del->iduser) {
    $del->delete();
          return Redirect::back();
}
  }

  public function editkomen(Request $request, $id){
    $edit = KomentarBarang::find($id);
    if (Auth::user()->id==$edit->iduser) {
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
          replykomentarbarang::create($insert);
          return Redirect::back();

  }

  public function hapusreply(Request $request, $id){
$del = replykomentarbarang::find($id);
    if (Auth::user()->level==1 || Auth::user()->id==$del->iduser) {
    $del->delete();
          return Redirect::back();
}
  }

  public function editreply(Request $request, $id){
    $edit = replykomentarbarang::find($id);
    if (Auth::user()->id==$edit->iduser) {
    $edit->replykomentar = $request->replykomentar;
    $edit->save();
          return Redirect::back();
    }
    else{
      return 'hayo';
    }
  }


//Fungsi View Admin dan User

public function viewBeliadmin(Request $request){
      $tampil=DB::table('checkout')
            ->join('barang', 'checkout.idbarang', '=', 'barang.idbarang')
            ->join('users', 'checkout.iduser', '=', 'users.id')
            ->join('buktitransfer', 'checkout.idpembelian', '=', 'buktitransfer.idcheckout')
            ->join('detailuser', 'checkout.iduser', '=', 'detailuser.iduser')
            ->select('buktitransfer.*', 'checkout.*', 'barang.*', 'users.name', 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->orderBy('checkout.created_at', 'desc')
            ->paginate(10);
      return view('daftarbeli',compact('tampil'));
}

public function viewBeliuser(Request $request){
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
            ->select('pembelian.*', 'barang.*', 'users.name' , 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where('pembelian.iduser','=',Auth::user()->id)
            ->orderBy('pembelian.created_at', 'asc')
            ->paginate(10);
      return view('daftarbeliuser',compact('tampil'));
}

public function viewdetBeli(Request $request, $idbeli){
      $tampil=DB::table('checkout')
            ->join('barang', 'checkout.idbarang', '=', 'barang.idbarang')
            ->join('users', 'checkout.iduser', '=', 'users.id')
            ->join('buktitransfer', 'checkout.idpembelian', '=', 'buktitransfer.idcheckout')
            ->join('detailuser', 'checkout.iduser', '=', 'detailuser.iduser')
            ->select('buktitransfer.*', 'checkout.*', 'barang.*', 'users.name' , 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where('checkout.idpembelian','=',$idbeli)
            ->get();
      if(Auth::user()->level==1 || Auth::user()->id==$tampil[0]->iduser){
      return view('viewdetailbeli',compact('tampil'));
    }
    else{
      return redirect('home');
    }
}

public function lihatKeranjang(Request $request, $idkeranjang){
      $tampil=DB::table('pembelian')
            ->join('barang', 'pembelian.idbarang', '=', 'barang.idbarang')
            ->join('users', 'pembelian.iduser', '=', 'users.id')
            ->join('detailuser', 'pembelian.iduser', '=', 'detailuser.iduser')
            ->select('pembelian.*', 'barang.*', 'users.name' , 'detailuser.*', DB::raw('jumlahbarang*hargabarang as total'))
            ->where([['pembelian.iduser','=',Auth::user()->id],['pembelian.idpembelian','=',$idkeranjang]])
            ->orderBy('pembelian.created_at', 'asc')
            ->first();
            // dd($tampil);
      if(Auth::user()->level==1 || Auth::user()->id==$tampil->iduser){
      return view('viewdetailkeranjang',compact('tampil'));
    }
    else{
      return redirect('home');
    }
}

  public function viewBarang(Request $request){
      $tampil=DB::table('barang')
              ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
              ->select('barang.*', 'jenisbarang.*')
              ->paginate(6);
        return view('viewbarang',compact('tampil'));
  }

  public function viewBarangUser(Request $request){
    $tampil=DB::table('barang')
            ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
            ->select('barang.*', 'jenisbarang.*')
            ->paginate(6);

            $recom = DB::table('barang')
                    ->join('jenisbarang', 'barang.idjenis', '=', 'jenisbarang.idjenis')
                    ->join('checkout', 'checkout.idbarang', '=', 'barang.idbarang')
                    ->select('barang.*','jenisbarang.*', DB::raw('count(checkout.idbarang) as hitung'))
                    ->groupBy('checkout.idbarang')
                    ->orderBy('hitung','desc')
                    ->take(5)->get();
        return view('viewbarangm',compact('tampil','recom'));
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
              ->paginate(4);
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

}
