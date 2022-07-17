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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// limeのホーム
Route::get('/lime/home', 'App\Http\Controllers\LimeController@index');

// 友達登録
Route::get('/lime/serch', 'App\Http\Controllers\LimeController@serch');
Route::post('/lime/serch', 'App\Http\Controllers\FreindController@register');

// Talk関係
Route::get('/lime/talk', 'App\Http\Controllers\TalkController@talk');
Route::post('/lime/talk', 'App\Http\Controllers\TalkController@talk');

// Talk送信
Route::post('/lime/send', 'App\Http\Controllers\TalkController@send');
