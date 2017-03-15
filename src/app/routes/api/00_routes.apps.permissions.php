<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::get('apps/permissions', ['as' => 'api.v1.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@adminView']);

    Route::group(['prefix' => 'v1/apps/permissions'], function ()
    {
        Route::get('/', ['as' => 'api.v1.api.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.api.apps.permissions.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@listUpdate']);
        Route::get('list', ['as' => 'api.v1.api.apps.permissions.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@list']);
        Route::get('search', ['as' => 'api.v1.api.apps.permissions.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@listSearch']);
        Route::get('{id}', ['as' => 'api.v1.api.apps.permissions.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.api.apps.permissions.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.api.apps.permissions.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@restore']);
        Route::post('merge', ['as' => 'api.v1.api.apps.permissions.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_create'], 'uses' => 'apps\\HCPermissionsController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@update']);
        Route::put('{id}/strict', ['as' => 'api.v1.api.apps.permissions.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\HCPermissionsController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\HCPermissionsController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.api.apps.permissions.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\HCPermissionsController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.api.apps.permissions.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\HCPermissionsController@forceDelete']);
    });
});
