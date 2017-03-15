<?php

Route::group(['prefix' => 'api', 'middleware' => ['web']], function () {
    Route::get('login', ['as' => 'api.v1.api.login', 'uses' => 'HCAppsController@showLogin']);
    Route::post('login', ['as' => 'api.v1.api.login', 'uses' => 'HCAppsController@login']);

    Route::get ('logout', ['as' => 'api.v1.api.logout', 'middleware' => 'auth-apps', 'uses' => 'HCAppsController@logout']);

});