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

Route::get('admin', 'SectionController@index')->name('admin');
Route::get('admin/section/{id}', 'SectionController@show')->name('admin.section');
Route::post('admin/section/{id}', 'SectionController@update')->name('admin.section');

Route::get('admin/notes', 'NoteController@index')->name('admin.notes');
Route::get('admin/images', 'ImageController@index')->name('admin.images');
Route::get('admin/links', 'LinkController@index')->name('admin.links');

Route::get('log', 'UserController@log')->name('log');
Route::get('refs', 'LinkController@index')->name('refs');

//Route::get('profile', 'UserController@profile')->name('profile');
//Route::get('inbox', 'MessageController@inbox');
