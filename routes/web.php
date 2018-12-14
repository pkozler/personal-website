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

Route::get('/', 'HomeController@index')->name('home');
Route::get('admin', 'UserController@index')->name('admin');
Route::get('log', 'GuestController@index')->name('log');

// správa sekcí hlavní stránky

Route::get('admin/sections', 'SectionController@index')->name('admin.sections');
Route::get('admin/section/edit/{section}', 'SectionController@edit')->name('admin.section.edit');
Route::post('admin/section/update/{section}', 'SectionController@update')->name('admin.section.update');

// správa seznamu dovedností

Route::get('admin/notes', 'NoteController@index')->name('admin.notes');
Route::get('admin/notes/bin', 'NoteController@recycle')->name('admin.notes.bin');
Route::get('admin/note/create', 'NoteController@create')->name('admin.note.create');
Route::post('admin/note/store', 'NoteController@store')->name('admin.note.store');
Route::get('admin/note/edit/{note}', 'NoteController@edit')->name('admin.note.edit');
Route::post('admin/note/update/{note}', 'NoteController@update')->name('admin.note.update');
Route::post('admin/note/delete/{note}', 'NoteController@delete')->name('admin.note.delete');
Route::post('admin/note/destroy/{note}', 'NoteController@destroy')->name('admin.note.destroy');

// správa galerie projektů

Route::get('admin/images', 'ImageController@index')->name('admin.images');
Route::get('admin/images/bin', 'ImageController@recycle')->name('admin.images.bin');
Route::get('admin/image/create', 'ImageController@create')->name('admin.image.create');
Route::post('admin/image/store', 'ImageController@store')->name('admin.image.store');
Route::get('admin/image/edit/{image}', 'ImageController@edit')->name('admin.image.edit');
Route::post('admin/image/update/{image}', 'ImageController@update')->name('admin.image.update');
Route::post('admin/image/delete/{image}', 'ImageController@delete')->name('admin.image.delete');
Route::post('admin/image/destroy/{image}', 'ImageController@destroy')->name('admin.image.destroy');

// správa kontaktních odkazů

Route::get('admin/links', 'LinkController@index')->name('admin.links');
Route::get('admin/links/bin', 'LinkController@recycle')->name('admin.links.bin');
Route::get('admin/link/create', 'LinkController@create')->name('admin.link.create');
Route::post('admin/link/store', 'LinkController@store')->name('admin.link.store');
Route::get('admin/link/edit/{link}', 'LinkController@edit')->name('admin.link.edit');
Route::post('admin/link/update/{link}', 'LinkController@update')->name('admin.link.update');
Route::post('admin/link/delete/{link}', 'LinkController@delete')->name('admin.link.delete');
Route::post('admin/link/destroy/{link}', 'LinkController@destroy')->name('admin.link.destroy');

Route::get('refs', 'LinkController@index')->name('refs');
