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


Route::match(['get','post'],'/',['as'=>'login','uses'=>'login\Logincontroller@login']);
Route::match(['get','post'],'login',['as'=>'login','uses'=>'login\Logincontroller@login']);

Route::match(['get','post'],'register',['as'=>'register','uses'=>'login\Logincontroller@register']);
Route::match(['get','post'],'logout',['as'=>'logout','uses'=>'login\Logincontroller@logout']);