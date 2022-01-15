<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('profile','AdminUserController@getProfile')->name('profile');
Route::post('profile','AdminUserController@profile')->name('profile.update');

Route::resource('students', 'StudentController');
Route::resource('schools', 'SchoolController');


