<?php
//Admin Routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

