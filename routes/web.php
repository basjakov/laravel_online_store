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

Route::get('/','HomeController@site');

Route::get('/register/newuser','HomeController@newRegistration')->name('register.newuser');
Route::delete('/register/deleteuser', 'HomeController@DestroyUser')->name('user.destroy');

Route::resource('/admin/storage','StorageController');
Route::resource('/admin/product','ProductController');
Route::resource('/admin/category','CategoryController');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
