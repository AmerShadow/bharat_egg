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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employee', function () {
    return view('emp_home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/customer', 'HomeController@createcustomer')->name('cust_add');
Route::post('/seller', 'HomeController@createseller')->name('seller_add');
Route::post('/inventory', 'HomeController@createinventory')->name('inv_add');
Route::get('/stock/{id}', 'HomeController@stockshow')->name('stock_show');
Route::post('/stock', 'HomeController@stockcreated')->name('stock');
Route::get('/catagory', 'HomeController@categoryshow')->name('category');
Route::post('/category', 'HomeController@createcategory')->name('cate_add');
Route::get('/catagory-del/{id}', 'HomeController@cat_del')->name('cate_del');
Route::get('/cust-del/{id}', 'HomeController@cust_del')->name('cust_del');
Route::get('/sale-del/{id}', 'HomeController@sale_del')->name('sale_del');

Route::post('/sell', 'HomeController@sell')->name('sell');
Route::get('/sell/{cust_id}', 'HomeController@make_bill')->name('bill');
Route::get('/ledger-purchase','HomeController@ledger_purchase')->name('l_s');
Route::get('/ledger-sale','HomeController@ledger_sale')->name('ledger_s');

Route::post('/update_bill/{id}/{bill_num}', 'HomeController@add_amount')->name('update_bill');
Route::post('/update_per/{id}', 'HomeController@add_per')->name('update_per');

Route::post('/add-expense', 'HomeController@add_expense')->name('add_expense');





Route::get('/balance-sheet', 'HomeController@m_balance_sheet')->name('b_sheet');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/expvehical', 'ExpVehicalController@expvehicalshow')->name('exp_vehical');
Route::post('/expvehical', 'ExpVehicalController@expvehicalcreated')->name('exp_vehical');
Route::get('/explabour', 'ExpLabourController@explabourshow')->name('exp_labour');
Route::post('/explabour', 'ExpLabourController@explabourcreated')->name('exp_labour');
Route::get('/expextra', 'ExpExtraController@expextrashow')->name('exp_extra');
Route::post('/expextra', 'ExpExtraController@expextracreated')->name('exp_extra');
Route::get('/exppersonal', 'ExpPersonalController@exppersonalshow')->name('exp_personal');
Route::post('/exppersonal', 'ExpPersonalController@exppersonalcreated')->name('exp_personal');
Route::get('/stockout/{id}', 'HomeController@stock_outshow')->name('make_bill');
Route::post('/stockout/{id}', 'HomeController@stock_outcreated')->name('stock_out');
Route::get('/payment', 'StockController@paymentshow')->name('payment');
Route::post('/payment', 'StockController@paymentcreated')->name('payment');
Route::get('/bill/{id}','HomeController@print_bill')->name('print_bill');
Route::get('/damage-stock/', 'HomeController@damaged')->name('damage_stock');
Route::post('/add-damaged', 'HomeController@damage')->name('add_damaged');
Route::get('/reciept/{id}','HomeController@rec_show')->name('rec_show');
Route::post('/rec_post','HomeController@recipt')->name('rec');
Route::get('/print_bill/{id}','HomeController@print_rec')->name('print_rec');
Route::get('/sale-detail','HomeController@sale_det')->name('sale_det');

Route::post('/search-lab','ExpLabourController@search')->name('search_lab');
Route::post('/search-s','HomeController@search_s')->name('search_s');
Route::post('/search-bs','HomeController@search_bs')->name('search_bs');
Route::post('/search-vh','ExpVehicalController@search')->name('search_vh');
Route::post('/search-c/{id}','HomeController@search_c')->name('search_c');

Route::get('/balance-sheet','HomeController@balance_sheet')->name('balance-sheet');
Route::get('/profile','HomeController@profile');
Route::post('/profile-sub','HomeController@profile_post')->name('profile');
Route::get('/my_credit','MyCreditController@my_creditshow')->name('my_credit');
Route::post('/my_credit','MyCreditController@my_credit')->name('my_credit');
Route::get('edit/{id}','ExpLabourController@editshow')->name('edit');
Route::post('/edit/{id}','ExpLabourController@explabourupdate')->name('edit');
