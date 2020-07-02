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
    
    
    // type (like... WOMAN,MAN etc...)
    Route::get('goods/type', 'Admin\GoodsController@type')->name('admin.type');
    
    // category (like... TOPS,BOTTOM etc...)
    Route::get('goods/category', 'Admin\GoodsController@category');
    
    // subcategory (like... T-SHIRTS,SKIRT etc..)
    Route::get('goods/subcategory', 'Admin\GoodsController@subCategory')->name('admin.subCategory');
    
    
    // goodsvariation
    Route::post('goods/variation/create', 'Admin\GoodsVariationController@create')->name('admin.variation.create');

    Route::get('goods/variation/create', 'Admin\GoodsVariationController@add')->name('admin.variation.add');

    Route::get('goods/variation', 'Admin\GoodsVariationController@index')->name('admin.variation');
    Route::get('goods/variation/edit', 'Admin\GoodsVariationController@edit')->name('admin.variation.edit');
    Route::post('goods/variation/edit', 'Admin\GoodsVariationController@update')->name('admin.variation.update');
    
    
});




Route::get('/', 'GoodsController@index');
Route::get('goods/{id}', 'GoodsController@show');

// カート表示
Route::get('/mycart', 'CartController@myCart')->name('mycart');
Route::post('/mycart', 'CartController@addMycart');
Route::post('/mycart/reduce', 'CartController@reduceMyCart');
Route::get('/mycartlist', 'CartController@myCartList')->name('mycartlist');
Route::post('/cartdelete','CartController@deleteCart')->name('mycart.delete');

// サブカテゴリ表示
Route::get('/sub_category/{sub_category_id}', 'GoodsController@getSubCategory');

// お問い合わせフォーム
//入力ページ
Route::get('/contact', 'ContactController@index')->name('contact.index');

//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');

Auth::routes();
