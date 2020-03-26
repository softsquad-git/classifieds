<?php

Route::get('/', 'Admin\AdminController@panel');

Route::group(['prefix' => 'categories'], function () {
    Route::post('/', 'Admin\Categories\CategoryController@items');
    Route::post('remove/{id}', 'Admin\Categories\CategoryController@delete');
    Route::post('store', 'Admin\Categories\CategoryController@store');
    Route::post('update/{id}', 'Admin\Categories\CategoryController@update');
    Route::post('show/{id}', 'Admin\Categories\CategoryController@show');
    Route::post('all', 'Admin\Categories\CategoryController@all');
});

Route::group(['prefix' => 'classifieds'], function () {
    Route::post('/', 'Admin\Classifieds\ClassifiedsController@items');
    Route::post('set-status/{id}', 'Admin\Classifieds\ClassifiedsController@setStatus');
});

Route::group(['prefix' => 'users'], function () {
    Route::post('/', 'Admin\Users\UserController@items');
    Route::post('update/{id}', 'Admin\Users\UserController@update');
    Route::post('{id}', 'Admin\Users\UserController@item');
});
