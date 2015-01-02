<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::api(['version' => 'v1'], function () {

    Route::post('oauth/access_token', function() {

        return Response::json(Authorizer::issueAccessToken());
    });

    Route::get('alumni', ['protected' => true, 'scopes' => 'access_alumni', function () {

        echo "test alumni";
    }]);

    Route::get('news', function () {

        echo "test news";
    });


    Route::get('/', 'Api\V1\Controllers\HomeController@index');
});
