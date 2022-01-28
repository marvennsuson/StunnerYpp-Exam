<?php

// namespace App\Laravel\Controllers\System;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'namespace' => "System",
    'as' => 'system.',
],function(){

    Route::group(['middleware' => "guest"],function(){
        Route::get('',['uses' => 'AuthController@redirect']);

        Route::get('/login',['as' => 'login','uses' => 'AuthController@login']);
        Route::post('/login',['as' => 'login_attempt', "uses" => "AuthController@login_attempt"]);
    });

    Route::group(['middleware' => "auth"],function(){

        Route::group(['prefix' => "profile",'as' => 'profile.'],function(){
            Route::get('',['as' => "index",'uses' => "ProfileController@index"]);
            Route::put('{id?}/update',['as' => 'update','uses' => 'ProfileController@update']);
        });

        Route::get('/logout',['as' => 'logout','uses' => "AuthController@logout"]);
        Route::get('/dashboard',['as' => 'dashboard.index','uses' => 'DashboardController@index']);


 
         //Clinic
         Route::group(['prefix' => 'song','as' => 'song.'],function(){
            Route::get('',['as' => 'index','uses' => 'SongController@index']);
            Route::get('create',['as' => 'create','uses' => 'SongController@create']);
            Route::post('create',['as' => 'store','uses' => 'SongController@store']);
            // Route::group(['middleware' => 'system.existingSong'],function(){
                Route::get('{id?}/edit',['as' => 'edit','uses' => 'SongController@edit']);
                Route::patch('{id?}/edit',['as' => 'update','uses' => 'SongController@update']);
                Route::delete('{id?}/delete',['as' => 'delete','uses' => 'SongController@delete']);
            // });
        });


        Route::group(['prefix' => 'category','as' => 'category.'],function(){
            Route::get('',['as' => 'index','uses' => 'CategoryController@index']);
            Route::get('create',['as' => 'create','uses' => 'CategoryController@create']);
            Route::post('create',['as' => 'store','uses' => 'CategoryController@store']);
            // Route::group(['middleware' => 'system.existingCategory'],function(){
                Route::get('{id?}/edit',['as' => 'edit','uses' => 'CategoryController@edit']);
                Route::patch('{id?}/edit',['as' => 'update','uses' => 'CategoryController@update']);
                Route::delete('{id?}/delete',['as' => 'delete','uses' => 'CategoryController@delete']);
            // });
        });


    });
});

