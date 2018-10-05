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
//Route::get('/registadmin','BarangController@redir');
Route::get('/registbarang','BarangController@redir')->middleware('auth', 'cekstat');
//Route::get('/insertBarang','BarangController');
Route::post('/insertBarang','BarangController@insertBarang')->middleware('auth', 'cekstat');
Route::get('/viewbarang','BarangController@viewBarang')->middleware('auth', 'cekstat');
Route::get('/viewbarang/{id}','BarangController@viewBarangSatuan')->middleware('auth');
Route::post('/postkomen/{id}','BarangController@postkomen')->middleware('auth');
Route::post('/editkomen/{id}','BarangController@editkomen')->middleware('auth');
Route::get('/hapuskomentar/{id}','BarangController@hapuskom')->middleware('auth');
Route::get('/viewbarangmod','BarangController@viewBarangmod')->middleware('auth', 'cekstat');
Route::get('/viewbarangm','BarangController@viewBarangUser');
Route::post('/updateuser/{id}','UserController@updateProfile')->middleware('auth');
Route::get('/viewuser','UserController@viewProfil')->middleware('auth');
Route::get('/viewuserlist','UserController@viewAll')->middleware('auth','cekstat');
Route::get('/viewuser/{id}','UserController@editGlobal')->middleware('auth', 'cekstat');
Route::get('/forbidden', function () {
    return view('forbidden');
});
Route::get('/batalbelimod/{id}','BarangController@batalBelimod')->middleware('auth', 'cekstat');
Route::get('/batalbeli/{id}','BarangController@batalBeli')->middleware('auth');
Route::get('/listbeli','BarangController@viewBeliuser')->middleware('auth');
Route::get('/listpembelian','BarangController@viewBeliadmin')->middleware('auth', 'cekstat');
Route::post('/belibarang/{id}','BarangController@beliBarang')->middleware('auth');
Route::get('/hapusbarang/{id}','BarangController@hapusBarang')->middleware('auth', 'cekstat');
Route::get('/hapusbarangmod/{id}','BarangController@hapusBarangmod')->middleware('auth', 'cekstat');
Route::get('/editbarang/{id}','BarangController@geteditBarang')->middleware('auth', 'cekstat');
Route::post('/updateBarang/{id}','BarangController@editBarang')->middleware('auth', 'cekstat');
Route::get('protected', ['middleware' => ['auth'], function() {
    return "this page requires that you be logged in and an Admin";
}]);
