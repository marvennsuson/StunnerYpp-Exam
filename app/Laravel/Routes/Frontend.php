<?php 

use Illuminate\Support\Facades\Route;
Route::group([
    'prefix' => '/',
    'namespace' => "Frontend",
    'as' => 'frontend.',
],function(){

    Route::get('',['uses' => 'HomeController@redirect']);

    Route::group(['prefix' => "home",'as' => 'home.'],function(){
        Route::get('',['as' => "index",'uses' => "HomeController@index"]);
        Route::get('show/{id?}',['as' => "show",'uses' => "HomeController@show"]);
       Route::get('fetchdata/',['as' => "getdata",'uses' => "HomeController@fetch_data_fromtable_music"]);
    });

});


?>