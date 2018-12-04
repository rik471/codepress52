<?php

use CodePress\CodeUser\Facade\Route as CodePressRoute;

Route::group(['middleware' => ['web']], function () {
});

Route::group(['middleware' => 'web'], function (){
    CodePressRoute::auth();
    
    Route::get('/', 'HomeController@index');
});

