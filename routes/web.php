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

Auth::routes();

Route::get('/', function () { return redirect('/home'); });

// ユーザーログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});


// ルートミドルウェアとは
// 認証済みユーザーのみアクセスを許可する

Route::group(['prefix' => 'admin'], function() {
    Route::get('goods/create', 'Admin\GoodsController@add');
    Route::post('goods/create', 'Admin\GoodsController@create');
    Route::get('goods', 'Admin\GoodsController@index');
    Route::get('goods/edit', 'Admin\GoodsController@edit');
    Route::post('goods/edit', 'Admin\GoodsController@update');
    Route::get('goods/delete', 'Admin\GoodsController@delete');
    
    // AdminHome
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    //login&logout
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    
    // register
    Route::get('register', 'Admin\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\LoginController@register')->name('admin.register');
    
    Route::get('goods/category', 'Admin\GoodsController@category');
   
    Route::get('goods/type', 'Admin\GoodsController@type')->name('admin.type');
    
    
});




Route::get('/', 'GoodsController@index');
Route::get('goods/{id}', 'GoodsController@show');
Route::get('/mycart', 'GoodsController@myCart')->name('mycart');
Route::post('/mycart', 'GoodsController@addMycart');


Auth::routes();
