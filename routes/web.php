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

Route::redirect('/', 'home');

Auth::routes();
Route::get('/adm', 'Admin\AdminController@index')->name('adm');

Route::get('/home', 'Web\HomeController@index')->name('home');

Route::get('/post/{slug}', 'Web\HomeController@post')->name('post');
Route::get('/category/{slug}', 'Web\HomeController@category')->name('category');
Route::get('/tag/{slug}', 'Web\HomeController@tag')->name('tag');
Route::get('/file', 'Web\FilesController@index')->name('file');


Route::resource('tags', 		'Admin\TagController');
Route::resource('categories', 	'Admin\CategoryController');
Route::resource('posts', 		'Admin\PostController');
Route::resource('files', 		'Admin\FileController');
