<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// Route::get('/store', 'HomeController@showStore')->middleware('auth');;
// Route::post('/redeem', 'UserController@redeem')->middleware('auth');;
// Route::get('/myGifts', 'UserController@myGifts')->middleware('auth');;
// Route::get('/returnGift/{id}', 'UserController@returnGift')->name('/returnGift')->middleware('auth');;


Route::get('/loginmark', function () {
    return view('loginmark');
});
