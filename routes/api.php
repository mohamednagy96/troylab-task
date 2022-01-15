<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    "namespace" => 'Api\V1',
], function () {

    /**
     * Authintecation routes
     */
    Route::group(["namespace" => "Auth"], function () {
        Route::post('login', 'AuthController@login');
    });

    Route::resource('students' , 'StudentController')->middleware('auth:admin-api');
});
