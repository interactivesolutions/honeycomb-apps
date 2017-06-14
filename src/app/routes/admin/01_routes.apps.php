<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps', ['as' => 'admin.apps.index', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@adminIndex']);

    Route::group(['prefix' => 'api/apps'], function ()
    {
        Route::get('/', ['as' => 'admin.api.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@apiDestroy']);

        Route::post('restore', ['as' => 'admin.api.apps.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.apps.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.apps.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function (){

            Route::get('/', ['as' => 'admin.api.apps.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.apps.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.apps.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.apps.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@apiForceDelete']);
        });
    });

});


