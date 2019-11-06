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


route::post('login', 'LoginController@login')->name('login');

Route::namespace('View')->group(function (){

    Route::get('/', 'UserViewController@index')->name('index');
    Route::get('category', 'UserViewController@category')->name('category');
    Route::get('category/{id}','UserViewController@viewEstab')->name('establishments');

});

Route::namespace('Dashboard')->group(function (){

    Route::prefix('dashboard')->group(function (){

        Route::get('','DashboardController@index')->name('dashboard.index');

        Route::prefix('admin')->group(function (){

            Route::get('','AdminsController@index')->name('admin.index');
            Route::get('/store','AdminsController@store')->name('admin.store');
            Route::post('/new','AdminsController@new')->name('admin.new');
            Route::get('/edit/{id}','AdminsController@edit')->name('admin.edit');
            Route::post('/update/{id}','AdminsController@update')->name('admin.update');
            Route::get('/remove/{id}','AdminsController@remove')->name('admin.remove');

        });

        Route::prefix('establishments')->group(function (){

            Route::get('','EstablishmentsController@index')->name('establishment.index');
            Route::get('/store','EstablishmentsController@store')->name('establishment.store');
            Route::post('/new','EstablishmentsController@new')->name('establishment.new');
            Route::get('/edit/{id}','EstablishmentsController@edit')->name('establishment.edit');
            Route::post('/update/{id}','EstablishmentsController@update')->name('establishment.update');
            Route::get('/remove/{id}','EstablishmentsController@remove')->name('establishment.remove');
            Route::get('/view/{id}','EstablishmentsController@view')->name('establishment.view');
            Route::post('/photos/{id}', 'EstablishmentPhotoController@upload')->name('establishment.photo.upload');
            Route::get('/photos/remove/{id}', 'EstablishmentPhotoController@remove')->name('establishment.photo.remove');

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

        Route::prefix('types')->group(function (){

            Route::get('','TypesController@index')->name('types.index');
            Route::get('/store','TypesController@store')->name('types.store');
            Route::post('/new','TypesController@new')->name('types.new');
            Route::get('/edit/{id}','TypesController@edit')->name('types.edit');
            Route::post('/update/{id}','TypesController@update')->name('types.update');
            Route::get('/remove/{id}','TypesController@remove')->name('types.remove');

        });

        Route::prefix('ratings')->group(function (){

            Route::get('','RatingsController@index')->name('ratings.index');
            Route::get('/store','RatingsController@store')->name('ratings.store');
            Route::post('/new','RatingsController@new')->name('ratings.new');
            Route::get('/edit/{id}','RatingsController@edit')->name('ratings.edit');
            Route::post('/update/{id}','RatingsController@update')->name('ratings.update');
            Route::get('/remove/{id}','RatingsController@remove')->name('ratings.remove');

        });

    });

});




