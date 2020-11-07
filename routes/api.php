<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'AuthenticationController@authenticate');
});

Route::group(['prefix' => 'user'], function() {
    Route::post('store', 'UserController@store');
    Route::put('update', 'UserController@update');
});