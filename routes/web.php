<?php

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::namespace('Admin\Auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');
});
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

