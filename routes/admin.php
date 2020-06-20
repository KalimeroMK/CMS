<?php
Route::resource('ads', 'AdController');
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController');
Route::resource('tags', 'TagController');
Route::resource('roles', 'RoleController');
Route::get('statistics', 'StatisticController@index')->name('statistics');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('users', 'UserController');
Route::resource('settings', 'SettingController');
Route::get('gallery/{id}/post', 'GalleryController@index')->name('addGallery');
Route::resource('gallery', 'GalleryController');
