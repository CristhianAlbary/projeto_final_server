<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'AuthenticationController@authenticate');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('find/all', 'UserController@findAll');

    Route::post('store', 'UserController@store');
    Route::put('update', 'UserController@update');
});

Route::group(['prefix' => 'task'], function() {
    Route::get('report/{id}', 'TaskController@report');
    Route::get('find/all', 'TaskController@findAll');
    Route::get('find/by/id/{id}', 'TaskController@findById');
    Route::get('find/by/user/{id}', 'TaskController@findByUser');

    Route::post('store', 'TaskController@store');

    Route::put('update', 'TaskController@update');
});

Route::group(['prefix' => 'messages'], function () {
    Route::get('conversation/{idOrigin}/{idDest}', 'MessagesController@getConversation');
});

Route::group(['prefix' => 'report'], function () {
    Route::get('get/pdf/{id}', 'TaskController@getPdf');
});