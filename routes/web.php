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
include_once app_path('Laravel/Routes/System.php');
include_once app_path('Laravel/Routes/Frontend.php');
// Route::get('/',['as' => 'login','uses' => 'System\AuthController@login']);
// Route::post('/login',['as' => 'login_attempt', "uses" => "System\AuthController@login_attempt"]);