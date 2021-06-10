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

    $products = \App\Product::all();
    $profile = \App\Profile::find(1);
    return view('index', compact(['products','profile']));
});
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('products', 'ProductController');
    Route::resource('stocks', 'StockController');
    Route::get('stocks/delete/{id}', 'StockController@delete');
    Route::resource('quotations', 'QuotationController');
    Route::post('quotations/store_data', 'QuotationController@storeData');
    Route::resource('invoices', 'BillingController');
    Route::post('/billing/store_data', 'BillingController@storeData');
    Route::get('/invoices/payment/{id}', 'BillingController@payment');
    Route::post('/invoices/payment-store/{id}', 'BillingController@paymentStore');
    Route::get('/laser', 'BillingController@laser');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile-edit/', 'HomeController@profileEdit')->name('home');
    Route::put('/profile-edit/', 'HomeController@profileStore')->name('home');

    // DEEPA

    Route::resource('customers', 'CustomerController');
    Route::resource('challans', 'ChallanController');
    Route::post('challans/store_data', 'ChallanController@storeData');
    Route::post('get_challan_details', 'ChallanController@getChallanDetails');
    Route::resource('sizes', 'SizeController');
    Route::resource('models', 'ModelController');
    Route::resource('brands', 'BrandController');
    Route::resource('colours', 'ColourController');

});



