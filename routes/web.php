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
    return view('home');
});

Route::get('/users', function () {
    //
});

Route::post('/users', function () {
    //
});

Route::get('/users/{id}', function () {
    //
});

Route::post('/users/{id}', function () {
    //
});

Route::post('/users/delete/{id}', function () {
    //
});

Route::post('/login', function () {
    //
});

Route::get('/logout', function () {
    //
});

Route::get('/messages/new', function () {
    //
});

Route::post('/messages', function () {
    //
});

Route::get('/messages', function () {
    //
});

Route::post('/messages/accept/{id}', function () {
    //
});

Route::post('/messages/reject/{id}', function () {
    //
});
