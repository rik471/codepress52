<?php

use CodePress\CodeUser\Facade\Route as CodePressRoute;

Route::get('/', function (){
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
});

Route::group(['middleware' => 'web'], function (){

    CodePressRoute::auth();
    
    Route::get('/', 'HomeController@index');
});

