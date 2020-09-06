<?php

use App\User;
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

// GET SCORE CSV
// Route::get('/score', function () {
//     $users = User::whereHas('gifts')->with('gifts')->get();
//     return view('score', compact('users'));
// });

Auth::routes(['register' => false]);


// COMMENT THIS TO CLOSE THE WEBSITE
// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth')
// Route::get('/store', 'HomeController@showStore')->middleware('auth');
// Route::post('/redeem', 'UserController@redeem')->middleware('auth');
// Route::get('/myGifts', 'UserController@myGifts')->middleware('auth');
// Route::get('/returnGift/{id}', 'UserController@returnGift')->name('/returnGift')->middleware('auth');

Route::get('/loginmark', function () {
    return view('loginmark');
});
