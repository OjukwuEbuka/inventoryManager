<?php
use App\Http\Controllers\GuardianController;

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

Route::view('contact', 'contact');

Route::view('about', 'about');

Route::get('login', 'LoginPageController@index')->name('login');
Route::get('/', 'LoginPageController@home')->name('home');
Route::post('login/user', 'LoginPageController@mainLogin');


Route::middleware(['auther'])->group(function(){
    Route::get('dashboard', 'LoginPageController@dashboard');
    Route::get('logout', 'LoginPageController@logout');

    // Categories
    Route::get('categories', 'CategoryController@index');
    Route::post('categories/new', 'CategoryController@store');
    Route::post('category/delete', 'CategoryController@delete');

    // Products
    Route::get('products', 'ProductController@index');
    Route::post('product/new', 'ProductController@store');
    Route::post('product/delete', 'ProductController@delete');
    
    
    // Purchases
    Route::get('purchases', 'PurchaseController@index');
    Route::post('purchase/store', 'PurchaseController@store');


    // Reports Purchases
    Route::get('reports/purchase', 'ReportController@purchase');
    Route::post('reports/purchase/month', 'ReportController@monthPurchase');
    Route::post('reports/purchase/day', 'ReportController@dayPurchase');
    
    // Reports Sales
    Route::get('reports/sale', 'ReportController@sale');
    Route::post('reports/sale/month', 'ReportController@monthSale');
    Route::post('reports/sale/day', 'ReportController@daySale');

    //Sales
    Route::get('sales', 'SaleController@index');
    Route::post('sales/store', 'SaleController@store');

});