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

Route::get('/','FrontendController@index');
Route::get('/product','FrontendController@product');
Route::get('/product-detail/{id}','FrontendController@productdetail');

Route::get('/cart','FrontendController@cart');

Route::post('/addcart','FrontendController@addcart');
Route::get('/getcart','FrontendController@getcart');
Route::post('/removecart','FrontendController@removecart');
Route::post('/updatecart','FrontendController@updatecart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clc', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
    // session()->forget('key');
    return "Cleared!";
});


Route::group([
    'as' => 'backoffice',
    'prefix' => 'backoffice'
],function(){
    Route::get('/index', 'backoffice\FrontendController@index')->name('index');
    // Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', 'backoffice\FrontendController@dashboard')->name('dashboard');

        Route::group(['as' => 'banner','prefix' => 'banner'],function(){
            Route::get('/index', 'backoffice\BannerController@index');
            Route::get('/create', 'backoffice\BannerController@create');
            Route::post('/store', 'backoffice\BannerController@store');
            Route::get('/edit/{id}', 'backoffice\BannerController@edit');
            Route::post('/update/{id}', 'backoffice\BannerController@update');
            Route::post('/delete/{id}', 'backoffice\BannerController@destroy');
            Route::post('/bannerdatatables', 'backoffice\BannerController@bannerdatatables');
        });

        Route::group(['as' => 'aboutus','prefix' => 'aboutus'],function(){
            Route::get('/index', 'backoffice\AboutController@index');
            Route::post('/store', 'backoffice\AboutController@store');
        });

        Route::group(['as' => 'contact','prefix' => 'contact'],function(){
            Route::get('/index', 'backoffice\ContactController@index');
            Route::post('/store', 'backoffice\ContactController@store');
        });

        Route::group(['as' => 'footer','prefix' => 'footer'],function(){
            Route::get('/index', 'backoffice\FooterController@index');
            Route::post('/store', 'backoffice\FooterController@store');
        });

        Route::group(['as' => 'category','prefix' => 'category'],function(){
            Route::get('/index', 'backoffice\CategoryController@index');
            Route::get('/create', 'backoffice\CategoryController@create');
            Route::post('/store', 'backoffice\CategoryController@store');
            Route::get('/edit/{id}', 'backoffice\CategoryController@edit');
            Route::post('/update/{id}', 'backoffice\CategoryController@update');
            Route::post('/delete/{id}', 'backoffice\CategoryController@destroy');
            Route::post('/categorydatatables', 'backoffice\CategoryController@categorydatatables');
        
        });
        

        Route::group(['as' => 'product','prefix' => 'product'],function(){
            Route::get('/index', 'backoffice\ProductController@index');
            Route::get('/create', 'backoffice\ProductController@create');
            Route::post('/store', 'backoffice\ProductController@store');
            Route::get('/edit/{id}', 'backoffice\ProductController@edit');
            Route::post('/update/{id}', 'backoffice\ProductController@update');
            Route::post('/delete/{id}', 'backoffice\ProductController@destroy');
            Route::post('/delete/images/{id}', 'backoffice\ProductController@delete');
            Route::post('/productdatatables', 'backoffice\ProductController@productdatatables');
        
            Route::get('/select', 'backoffice\ProductController@select');
            Route::get('/selectitem/{id}', 'backoffice\ProductController@selectitem');

            Route::get('/custom/{id}', 'backoffice\CustomizeController@index');
        });


    // });
});