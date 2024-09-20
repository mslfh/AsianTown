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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('index');
    });

    //User
    Route::put('/initUser', 'UserController@initUser');

    Route::resource('user', 'UserController');

    Route::resource('products', 'ProductController');

    Route::get('/getAllProductName', 'ProductController@getAllProductName');

    Route::resource('units', 'UnitController');

    Route::resource('product_category_item', 'ProductCategoryItemController');
    Route::get('/getAllCategories', 'ProductCategoryItemController@getAllCategories');


    Route::get('/deliveryRecords/handleDelivery', 'DeliveryRecordController@handleDelivery');
    Route::resource('deliveryRecords', 'DeliveryRecordController');

    Route::resource('purchasers', 'PurchaserController');
});



