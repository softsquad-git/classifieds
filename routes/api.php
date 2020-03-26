<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
});

Route::group(['prefix' => 'classifieds'], function (){
    Route::post('/', 'Front\Classifieds\ClassifiedsController@items');
    Route::post('{id}', 'Front\Classifieds\ClassifiedsController@item');
});

Route::group(['prefix' => 'categories'], function (){
    Route::post('/', 'Front\Categories\CategoryController@items');
    Route::post('{id}', 'Front\Categories\CategoryController@item');
});

Route::group(['middleware' => 'jwt.auth'], function (){

    Route::post('activate', 'Auth\AuthController@activate');

    Route::group(['prefix' => 'user'], function () {
        Route::post('/', 'Auth\AuthController@me');
        Route::group(['prefix' => 'classifieds'], function () {
            Route::post('/', 'User\Classifieds\ClassifiedsController@items');                   #list published classifieds
            Route::post('archives', 'User\Classifieds\ClassifiedsController@itemsArchive');     #list archives classifieds
            Route::post('waiting', 'User\Classifieds\ClassifiedsController@itemsWaiting');      #list waiting classifieds
            Route::post('locked', 'User\Classifieds\ClassifiedsController@itemsLocked');        #list locked classifieds
            Route::post('promo', 'User\Classifieds\ClassifiedsController@itemsPromo');          #list promo classifieds
            Route::post('item/{id}', 'User\Classifieds\ClassifiedsController@item');            #show advertisement
            Route::post('store', 'User\Classifieds\ClassifiedsController@store');               #add advertisement
            Route::post('update/{id}', 'User\Classifieds\ClassifiedsController@update');        #edit advertisement
            Route::post('delete/{id}', 'User\Classifieds\ClassifiedsController@delete');        #remove advertisement
            Route::post('archive/{id}', 'User\Classifieds\ClassifiedsController@archive');      #archive advertisement
        });
    });
});
Route::group(['prefix' => 'admin'], function () {
    include 'admin.web.php';
});
