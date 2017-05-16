<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function () {
    Route::group(['prefix' => 'v1/apps'], function () {
        Route::get('/', ['as' => 'api.v1.apps', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@apiDestroy']);

        Route::group(['prefix' => 'list'], function () {
            Route::get('/', ['as' => 'api.v1.apps.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiIndex']);
            Route::get('{timestamp}', ['as' => 'api.v1.apps.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.apps.restore', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.apps.merge', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_create', 'acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.apps.force.multi', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['as' => 'api.v1.apps.single', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.apps.update.strict', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.apps.duplicate', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.apps.force', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@apiForceDelete']);
        });
    });
});
