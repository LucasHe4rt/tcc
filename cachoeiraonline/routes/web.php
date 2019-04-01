<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function (){

    Route::prefix('admin')->group(function (){

        Route::get('','AdminsController@index')->name('admin.index');
        Route::get('/store','AdminsController@store')->name('admin.store');
        Route::post('/new','AdminsController@new')->name('admin.new');
        Route::get('/edit/{id}','AdminsController@edit')->name('admin.edit');
        Route::post('/update/{id}','AdminsController@update')->name('admin.update');
        Route::get('/remove/{id}','AdminsController@remove')->name('admin.remove');

    });

    Route::prefix('users')->group(function (){

        Route::get('','UsersController@index')->name('user.index');
        Route::get('/store','UsersController@store')->name('user.store');
        Route::post('/new','UsersController@new')->name('user.new');
        Route::get('/edit/{id}','UsersController@edit')->name('user.edit');
        Route::post('/update/{id}','UsersController@update')->name('user.update');
        Route::get('/remove/{id}','UsersController@remove')->name('user.remove');

    });

    Route::prefix('establishments')->group(function (){

        Route::get('','EstablishmentsController@index')->name('establishment.index');
        Route::get('/store','EstablishmentsController@store')->name('establishment.store');
        Route::post('/new','EstablishmentsController@new')->name('establishment.new');
        Route::get('/edit/{id}','EstablishmentsController@edit')->name('establishment.edit');
        Route::post('/update/{id}','EstablishmentsController@update')->name('establishment.update');
        Route::get('/remove/{id}','EstablishmentsController@remove')->name('establishment.remove');

    });

    Route::prefix('phoneEstab')->group(function (){

        Route::get('','PhonesEstabController@index')->name('phoneEstab.index');
        Route::get('/store','PhonesEstabController@store')->name('phoneEstab.store');
        Route::post('/new','PhonesEstabController@new')->name('phoneEstab.new');
        Route::get('/edit/{id}','PhonesEstabController@edit')->name('phoneEstab.edit');
        Route::post('/update/{id}','PhonesEstabController@update')->name('phoneEstab.update');
        Route::get('/remove/{id}','PhonesEstabController@remove')->name('phoneEstab.remove');

    });

    Route::prefix('phoneUsers')->group(function (){

        Route::get('','PhonesUsersController@index')->name('phoneUsers.index');
        Route::get('/store','PhonesUsersController@store')->name('phoneUsers.store');
        Route::post('/new','PhonesUsersController@new')->name('phoneUsers.new');
        Route::get('/edit/{id}','PhonesUsersController@edit')->name('phoneUsers.edit');
        Route::post('/update/{id}','PhonesUsersController@update')->name('phoneUsers.update');
        Route::get('/remove/{id}','PhonesUsersController@remove')->name('phoneUsers.remove');

    });

});


