<?php

use UniSharp\LaravelFilemanager\Lfm;

Route::feeds();
Route::get('sitemap', 'Controller@sitemap');
//Admin Routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
