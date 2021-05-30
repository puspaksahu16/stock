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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('products', 'ProductController');
    Route::resource('invoices', 'BillingController');

    Route::get('/home', 'HomeController@index')->name('home');

    // DEEPA

    Route::resource('customers', 'CustomerController');
    Route::resource('challans', 'ChallanController');
    Route::resource('sizes', 'SizeController');
    Route::resource('models', 'ModelController');
    Route::resource('brands', 'BrandController');
    Route::resource('colours', 'ColourController');

});



