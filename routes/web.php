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

Route::get('/', 'ProductsController@list')->name('product.list');

Route::group(array('prefix'=>'product'), function() 
{
    $ProductsCtrl='ProductsController@';

    Route::get('list', $ProductsCtrl.'list')->name('product.list');

    Route::get('add', $ProductsCtrl.'add')->name('product.add');

    Route::post('store', $ProductsCtrl.'store')->name('product.store');

    Route::get('edit/{id}', $ProductsCtrl.'edit')->name('product.edit');

    Route::post('update/{id}', $ProductsCtrl.'update')->name('product.update');

    Route::get('delete/{id}', $ProductsCtrl.'delete')->name('product.delete');

    Route::get('search/{name}', $ProductsCtrl.'search')->name('product.search');
});

Route::group(array('prefix'=>'product-options'), function() 
{
    $ProductsCtrl='ProductOptionsController@';

    Route::get('list', $ProductsCtrl.'list')->name('product-options.list');

    Route::get('add', $ProductsCtrl.'add')->name('product-options.add');

    Route::post('store', $ProductsCtrl.'store')->name('product-options.store');

    Route::get('edit/{id}', $ProductsCtrl.'edit')->name('product-options.edit');

    Route::post('update/{id}', $ProductsCtrl.'update')->name('product-options.update');

    Route::get('delete/{id}', $ProductsCtrl.'delete')->name('product-options.delete');

});