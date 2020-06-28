<?php
Route::get('/', 'LoginSecurityController@show2faForm');
Route::post('/generateSecret', 'LoginSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/enable2fa', 'LoginSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa', 'LoginSecurityController@disable2fa')->name('disable2fa');

// 2fa middleware
Route::post('/2faVerify', 'LoginSecurityController@verify2fa')->name('2faVerify')->middleware('2fa');
