<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'AuthenticationController@authenticate');
});

Route::group(['prefix' => 'user'], function() {
    Route::post('store', 'UserController@store');
    Route::put('update', 'UserController@update');
});

Route::group(['prefix' => 'task'], function() {
    Route::get('find/all', 'TaskController@findAll');
    Route::get('find/by/id/{id}', 'TaskController@findById');
    Route::get('find/by/params/{params}', 'TaskController@findByParam');

    Route::post('store', 'TaskController@store');
    
    Route::put('update', 'TaskController@update');
});