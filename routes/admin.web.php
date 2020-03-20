<?php

Route::get('/', 'Admin\AdminController@panel');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'Admin\Categories\CategoryController@items');
    Route::get('create', 'Admin\Categories\CategoryController@create');
    Route::get('edit/{id}', 'Admin\Categories\CategoryController@edit');
    Route::get('remove/{id}', 'Admin\Categories\CategoryController@delete');
    Route::post('store', 'Admin\Categories\CategoryController@store');
    Route::post('update/{id}', 'Admin\Categories\CategoryController@update');
});
