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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@cust_show')->name('customer');
Route::post('/customer', 'HomeController@createcustomer')->name('cust_add');
Route::post('/category', 'HomeController@createcategory')->name('cate_add');
Route::post('/inventory', 'HomeController@createinventory')->name('inv_add');
Route::post('/credit', 'HomeController@credit')->name('credit');
Route::post('/sell', 'HomeController@sell')->name('sell');

// Route::get('/stock', 'HomeController@stockshow')->name('stock');
// Route::post('/stock', 'HomeController@stockcreated')->name('stock');
// Route::get('/category', 'HomeController@categoryshow')->name('category');
// Route::post('/category', 'HomeController@categorycreated')->name('category');


