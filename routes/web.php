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
Route::middleware('auth', function(){
//Route::get('/registadmin','RegistAdminController@adminRegist');
Route::get('/registadmin', function () {
    return 'tes';
});
});
