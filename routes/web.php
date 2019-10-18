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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/insert_post', 'postcontroller@store');
Route::get('/all_post', 'postcontroller@all_post')->name('all_post');
Route::get('/delete_post/{id}', 'postcontroller@delete_post');
Route::get('/change_pass', 'HomeController@change_pass')->name('change_pass');
Route::post('/update_pass', 'HomeController@update_pass');
