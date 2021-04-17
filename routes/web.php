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

Route::get('generate/get/party/details/{id}', ['as' => 'get.party.details' , 'uses' => 'Admin\GenerateexcelControler@getPartyDetails']);
Route::get('generate/get/item/details/{id}', ['as' => 'get.item.details' , 'uses' => 'Admin\GenerateexcelControler@getItemDetails']);

Route::get('generate/quotation/{id}', ['as' => 'generate.quotaion' , 'uses' => 'Admin\QuotationsController@generateQuotaion']);
