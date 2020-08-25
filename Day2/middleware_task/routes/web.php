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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/superadmin', 'UserController@superadmin');
    Route::get('/admin', 'UserController@admin');
    Route::get('/guest', 'UserController@guest');
});
