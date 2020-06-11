<?php
Route::feeds();
Route::get('sitemap', 'Controller@sitemap');
//Admin Routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

