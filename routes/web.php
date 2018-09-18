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

Route::group(['namespace'=>'User'], function() {

    Route::post('/contact_us', 'ContactController@store')->name('contact_us.store');

});



Route::group(['namespace'=>'Admin', 'prefix'=>'admin'], function() {

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\LoginController@login');

    Route::get('/home', 'HomeController@index')->name('admin.home');

    Route::resource('/product', 'ProductController');

    Route::get('/quantity/add/{product}', 'ProductController@addQuantity')->name('quantity.add');

    Route::post('/quantity/add/{product}', 'ProductController@addQuantityPost')->name('quantity.addSum');

    Route::resource('/add_product', 'AddProductController');

    Route::resource('/admins', 'AdminUsersController');

    Route::resource('/batch', 'BatchController');

    Route::resource('/role', 'RoleController');

    Route::resource('/permission', 'PermissionController');

    // invoice

    Route::resource('/invoice', 'InvoiceController');


    Route::get('/invoice/{invoice}', 'InvoiceController@invoiceProduct')->name('invoiceProduct.index');

    Route::get('/invoice/pdf/{invoice}', 'InvoiceController@pdf')->name('invoice.pdf');

    Route::post('/invoice/store{invoice}', 'InvoiceController@invoiceProductStore')->name('invoiceProduct.store');

    Route::get('/invoice/edit/{invoiceProduct}', 'InvoiceController@invoiceProductEdit')->name('invoiceProduct.edit');

    Route::patch('/invoice/update/{invoiceProduct}', 'InvoiceController@invoiceProductUpdate')->name('invoiceProduct.update');

    Route::delete('/invoice/destroy/{invoiceProduct}', 'InvoiceController@invoiceProductDestroy')->name('invoiceProduct.destroy');

    Route::post('/invoice/mail/{invoice}', 'InvoiceController@mail')->name('invoice.email');


    // receipt

    Route::resource('/receipt', 'ReceiptController');

    Route::get('/receipt/{receipt}', 'ReceiptController@receiptProduct')->name('receiptProduct.index');

    Route::post('/receipt/store/{receipt}', 'ReceiptController@receiptProductStore')->name('receiptProduct.store');

    Route::get('/receipt/edit/{receiptProduct}', 'ReceiptController@receiptProductEdit')->name('receiptProduct.edit');

    Route::patch('/receipt/update/{receiptProduct}', 'ReceiptController@receiptProductUpdate')->name('receiptProduct.update');

    Route::delete('/receipt/destroy/{receiptProduct}', 'ReceiptController@receiptProductDestroy')->name('receiptProduct.destroy');

    Route::get('/receipt/pdf/{receipt}', 'ReceiptController@pdf')->name('receipt.pdf');

    Route::post('/receipt/mail/{receipt}', 'ReceiptController@mail')->name('receipt.email');




    // Supply Management Request

    Route::resource('/request', 'RequestController');

    Route::get('/request/{request}', 'RequestController@receiptProduct')->name('requestProduct.index');

    Route::post('/request/store/{requesting}', 'RequestController@requestProductStore')->name('requestProduct.store');

    Route::get('/request/edit/{requestProduct}', 'RequestController@requestProductEdit')->name('requestProduct.edit');

    Route::patch('/request/update/{requestProduct}', 'RequestController@requestProductUpdate')->name('requestProduct.update');

    Route::delete('/request/destroy/{requestProduct}', 'RequestController@requestProductDestroy')->name('requestProduct.destroy');

    Route::get('/request/pdf/{request}', 'RequestController@pdf')->name('request.pdf');

    Route::post('/request/mail/{requesting}', 'RequestController@mail')->name('request.email');

    // receive

    Route::resource('/receive', 'ReceiveController');


    // supply

    Route::resource('/supplier', 'SupplierController');

    // purchase

    Route::resource('/purchase', 'PurchaseController');

    // client

    Route::resource('/client', 'ClientController');

    // contact

    Route::resource('/contact', 'ContactController');


    // sales

    Route::get('/sale', 'SaleController@index')->name('sale.index');




});
