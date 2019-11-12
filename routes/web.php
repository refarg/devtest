<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::Auth();
//Auth::routes();

Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/viewbarang/{id}','BarangController@viewBarangSatuan');
Route::get('/viewbarang','BarangController@viewBarangUser');
Route::get('viewbarangs','featureController@search');

Route::middleware(['auth'])->group(function () {
  //CRUD Komentar User
  Route::post('/postkomen/{id}','BarangController@postkomen');
  Route::post('/editkomen/{id}','BarangController@editkomen');
  Route::get('/hapuskomentar/{id}','BarangController@hapuskom');
  //CRUD Reply Komentar User
  Route::post('/postreply/{idkomen}','BarangController@postreply');
  Route::post('/editreply/{id}','BarangController@editreply');
  Route::get('/hapusreply/{id}','BarangController@hapusreply');
  //RU Profil User
  Route::get('/viewuser','UserController@viewProfil');
  Route::post('/updateuser/{id}','UserController@updateProfile');
  //Pembelian, pembatalan, dan cek keranjang belanja user
  Route::get('/belibarang/{id}','BarangController@getbeli');
  Route::get('/listbeli','BarangController@viewBeliuser');
  Route::get('/listbeli/detail/{idkeranjang}', 'BarangController@lihatKeranjang');

  Route::get('/batalbeli/{id}','BarangController@batalBeli');
  Route::post('/belibarang/{id}','BarangController@beliBarang');
  //Kirim bukti pembayaran
  Route::post('/submitbukti/{bukti}','BarangController@sendBukti');

  Route::post('/checkout','BarangController@docheckout')->name('checkout');
  Route::get('/listcheckout','BarangController@viewCheckoutuser');
  Route::get('/listcheckout/detail/{idbeli}','BarangController@viewdetBeli');
  Route::post('/undocheckout/{id}','BarangController@batalcheckout');
});



Route::middleware(['auth','cekstat'])->group(function () {
//Registrasi Barang
Route::get('/registbarang','BarangController@redir');
Route::post('/insertBarang','BarangController@insertBarang');
//Melihat Barang (List dan Grid), RUD
Route::get('/viewbarangm','BarangController@viewBarang');
Route::get('/viewbarangmod','BarangController@viewBarangmod');
//Melihat daftar user dan update data user
Route::get('/viewuserlist','UserController@viewAll');
Route::get('/viewuser/{id}','UserController@editGlobal');
//Melakukan edit barang
Route::get('/editbarang/{id}','BarangController@geteditBarang');
Route::post('/updateBarang/{id}','BarangController@editBarang');
//Menghapus barang dari tampilan list dan Grid
Route::get('/hapusbarang/{id}','BarangController@hapusBarang');
Route::get('/hapusbarangmod/{id}','BarangController@hapusBarangmod');
//Melihat keranjang belanja semua user
Route::get('/listpembelian','BarangController@viewBeliadmin');
//Membatalkan pembelian oleh admin
Route::get('/batalbelimod/{id}','BarangController@batalBelimod');
//Validasi pembayaran oleh Admin
Route::get('/verifikasi/{idbayar}','BarangController@doverif');
//Input resi oleh Admin
Route::post('/updateresi/{id}','BarangController@updateResi');
});

Route::get('recommend','featureController@recommend');

Route::get('/forbidden', function () {
    return view('forbidden');
});
