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
Route::get('/viewbarangmodern','BarangController@viewBarangmod')->middleware('auth', 'cekstat');
Route::get('/viewbarangm','BarangController@viewBarangUser');
Route::get('/forbidden', function () {
    return view('forbidden');
});
Route::get('/listbeli','BarangController@viewBeliuser')->middleware('auth');
Route::get('/listpembelian','BarangController@viewBeliadmin')->middleware('auth', 'cekstat');
Route::post('/belibarang/{id}','BarangController@beliBarang')->middleware('auth');
Route::get('/hapusbarang/{id}','BarangController@hapusBarang')->middleware('auth', 'cekstat');
Route::get('/editbarang/{id}','BarangController@geteditBarang')->middleware('auth', 'cekstat');
Route::post('/updateBarang/{id}','BarangController@editBarang')->middleware('auth', 'cekstat');
Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);
