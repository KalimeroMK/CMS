<?php

Route::feeds();
Route::get('sitemap', 'Controller@sitemap');
//Admin Routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');