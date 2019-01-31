<?php

Route::redirect('/', 'home');

Auth::routes();
Route::get('/adm', 'Admin\AdminController@index')->name('adm');

Route::get('/home', 'Web\HomeController@index')->name('home');

Route::get('/post/{slug}', 'Web\HomeController@post')->name('post');
Route::get('/category/{slug}', 'Web\HomeController@category')->name('category');
Route::get('/tag/{slug}', 'Web\HomeController@tag')->name('tag');


Route::get('/file/{slug}', 'Web\FilesController@index')->name('file');
Route::resource('file', 		'Web\FilesController');


Route::resource('tags', 		'Admin\TagController');
Route::resource('categories', 	'Admin\CategoryController');
Route::resource('posts', 		'Admin\PostController');
Route::resource('files', 		'Admin\FileController');
