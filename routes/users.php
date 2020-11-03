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

// Route::match(['get','post'],'/',['as'=>'login','uses'=>'login\Logincontroller@login']);
$adminPrefix = "";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['user']], function() {
    Route::match(['get','post'],'dashboard',['as'=>'dashboard','uses'=>'dashboard\Dashboardcontroller@dashboard']);


    Route::match(['get','post'],'customer-list',['as'=>'customer-list','uses'=>'customer\Customercontroller@list']);
    Route::match(['get','post'],'customer-add',['as'=>'customer-add','uses'=>'customer\Customercontroller@add']);
    Route::match(['get','post'],'customer-edit/{id}',['as'=>'customer-edit','uses'=>'customer\Customercontroller@edit']);
    Route::match(['get','post'],'customer-view/{id}',['as'=>'customer-view','uses'=>'customer\Customercontroller@view']);
    Route::match(['get','post'],'customer-ajaxaction',['as'=>'customer-ajaxaction','uses'=>'customer\Customercontroller@ajaxaction']);


    Route::match(['get','post'],'customer-list-paginate',['as'=>'customer-list-paginate','uses'=>'customer\Customercontroller@listpaginate']);
}); 