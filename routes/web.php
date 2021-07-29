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

Route::get('/','MainController@index' )->name('home');
Route::post('/','MainController@store' )->name('store');
Route::get('/download/{name}','MainController@download' )->name('download');
Route::get('/delete/{name}','MainController@delete' )->name('delete');
