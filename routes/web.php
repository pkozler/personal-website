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

Auth::routes();

// hlavní části aplikace

Route::get('/', 'HomeController')->name('home');
Route::get('admin', 'UserController')->name('admin');
Route::get('log', 'GuestController')->name('log');

// načtení kontaktních odkazů do hlavní stránky
Route::get('refs', 'HomeController@refs')->name('refs');

Route::namespace('Admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {

            Route::resource('sections', 'SectionController')->only([
                'index', 'edit', 'update'
            ]);

            Route::resource('notes', 'NoteController')->except([
                'show'
            ]);

            Route::resource('images', 'ImageController')->except([
                'show'
            ]);

            Route::resource('links', 'LinkController')->except([
                'show'
            ]);


        });
    });

});
