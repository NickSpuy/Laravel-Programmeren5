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

/* 
Dynamic routing
Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an id of '.$id;
});

*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/search', 'PostsController@search')->name('search');

Route::resource('posts', 'PostsController');
Route::resource('admin', 'AdminController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/admin', 'AdminController@admin')->name('admin');