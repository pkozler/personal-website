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

Route::get('/', 'HomeController@index')->name('home');
Route::get('log', 'UserController@log')->name('log');

Route::get('admin', 'SectionController@index')->name('admin');
Route::get('admin/section/{id}', 'SectionController@show')->name('admin.section');
Route::post('admin/section/{id}', 'SectionController@update')->name('admin.section');

//Route::get('profile', 'UserController@profile')->name('profile');
//Route::get('inbox', 'MessageController@inbox');
