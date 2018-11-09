<?php



Route::group(['middleware' => ['web']], function () {
});

Route::group(['middleware' => 'web'], function (){
    Route::auth();
    Route::get('/', 'HomeController@index');
});

