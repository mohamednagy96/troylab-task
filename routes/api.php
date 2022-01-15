<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'v1',
    "namespace" => 'Api\V1',
], function () {

    /**
     * Authintecation routes
     */
    Route::group(["namespace" => "Auth"], function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
    });
});
