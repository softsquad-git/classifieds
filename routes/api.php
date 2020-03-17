<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
});

Route::group(['prefix' => 'user'], function () {
    Route::post('/', 'Auth\AuthController@me');
    Route::group(['prefix' => 'classifieds'], function () {
        Route::post('/', 'User\Classifieds\ClassifiedsController@items');
        Route::post('item/{id}', 'User\Classifieds\ClassifiedsController@item');
        Route::post('store', 'User\Classifieds\ClassifiedsController@store');
        Route::post('update/{id}', 'User\Classifieds\ClassifiedsController@update');
        Route::post('delete/{id}', 'User\Classifieds\ClassifiedsController@delete');
    });
});
