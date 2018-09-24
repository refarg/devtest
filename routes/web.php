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
Route::get('/forbidden', function () {
    return view('forbidden');
});
Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);
