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


Auth::routes();

Route::middleware('auth')->group(function () {
  Route::resource('sellers', 'SellerController');
  Route::resource('clients', 'ClientController');
  Route::get('/', 'SellerController@index');
  Route::get('/home', 'SellerController@index')->name('home');
  Route::get('/fake', 'HomeController@fakeData')->name('fake');
});
