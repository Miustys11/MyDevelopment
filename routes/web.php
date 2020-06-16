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

// Route::get('/', function () {
//     return view('welcome');
// });

// ルートミドルウェアとは
// 認証済みユーザーのみアクセスを許可する

Route::group(['prefix' => 'admin'], function() {
    Route::get('goods/create', 'Admin\GoodsController@add')->middleware('auth');
    Route::post('goods/create', 'Admin\GoodsController@create')->middleware('auth');
    Route::get('goods', 'Admin\GoodsController@index')->middleware('auth');
    Route::get('goods/edit', 'Admin\GoodsController@edit')->middleware('auth');
    Route::post('goods/edit', 'Admin\GoodsController@update')->middleware('auth');
    Route::get('goods/delete', 'Admin\GoodsController@delete')->middleware('auth');
});


Route::get('/', 'GoodsController@index');
Route::get('goods/{id}', 'GoodsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
