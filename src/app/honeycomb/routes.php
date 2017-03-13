<?php

//interactivesolutions/honeycomb-apps/src/app/routes/routes.apps.permissions.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/permissions', ['as' => 'admin.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps/permissions', ['as' => 'admin.api.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@pageData']);
        Route::get('apps/permissions/list', ['as' => 'admin.api.apps.permissions.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@list']);
        Route::get('apps/permissions/search', ['as' => 'admin.api.apps.permissions.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@search']);
        Route::get('apps/permissions/{id}', ['as' => 'admin.api.apps.permissions.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@getSingleRecord']);
        Route::post('apps/permissions/{id}/duplicate', ['as' => 'admin.api.apps.permissions.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@duplicate']);
        Route::post('apps/permissions/restore', ['as' => 'admin.api.apps.permissions.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@restore']);
        Route::post('apps/permissions/merge', ['as' => 'admin.api.apps.permissions.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@merge']);
        Route::post('apps/permissions', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_create'], 'uses' => 'apps\\PermissionsController@create']);
        Route::put('apps/permissions/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@update']);
        Route::put('apps/permissions/{id}/strict', ['as' => 'admin.api.apps.permissions.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@updateStrict']);
        Route::delete('apps/permissions/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\PermissionsController@delete']);
        Route::delete('apps/permissions', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\PermissionsController@delete']);
        Route::delete('apps/permissions/{id}/force', ['as' => 'admin.api.apps.permissions.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\PermissionsController@forceDelete']);
        Route::delete('apps/permissions/force', ['as' => 'admin.api.apps.permissions.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\PermissionsController@forceDelete']);
    });
});

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        Route::get('apps/permissions', ['as' => 'api.v1.apps.permissions', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@pageData']);
        Route::get('apps/permissions/list', ['as' => 'api.v1.apps.permissions.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@list']);
        Route::get('apps/permissions/search', ['as' => 'api.v1.apps.permissions.search', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@search']);
        Route::get('apps/permissions/{id}', ['as' => 'api.v1.apps.permissions.single', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\PermissionsController@getSingleRecord']);
        Route::post('apps/permissions/{id}/duplicate', ['as' => 'api.v1.apps.permissions.duplicate', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@duplicate']);
        Route::post('apps/permissions/restore', ['as' => 'api.v1.apps.permissions.restore', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@restore']);
        Route::post('apps/permissions/merge', ['as' => 'api.v1.apps.permissions.merge', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@merge']);
        Route::post('apps/permissions', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_create'], 'uses' => 'apps\\PermissionsController@create']);
        Route::put('apps/permissions/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@update']);
        Route::put('apps/permissions/{id}/strict', ['as' => 'api.v1.apps.permissions.update.strict', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\PermissionsController@updateStrict']);
        Route::delete('apps/permissions/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\PermissionsController@delete']);
        Route::delete('apps/permissions', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\PermissionsController@delete']);
        Route::delete('apps/permissions/{id}/force', ['as' => 'api.v1.apps.permissions.force', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\PermissionsController@forceDelete']);
        Route::delete('apps/permissions/force', ['as' => 'api.v1.apps.permissions.force.multi', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\PermissionsController@forceDelete']);
    });
});


//interactivesolutions/honeycomb-apps/src/app/routes/routes.apps.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps', ['as' => 'admin.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps', ['as' => 'admin.api.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@pageData']);
        Route::get('apps/list', ['as' => 'admin.api.apps.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@list']);
        Route::get('apps/search', ['as' => 'admin.api.apps.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@search']);
        Route::get('apps/{id}', ['as' => 'admin.api.apps.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@getSingleRecord']);
        Route::post('apps/{id}/duplicate', ['as' => 'admin.api.apps.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@duplicate']);
        Route::post('apps/restore', ['as' => 'admin.api.apps.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@restore']);
        Route::post('apps/merge', ['as' => 'admin.api.apps.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@merge']);
        Route::post('apps', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@create']);
        Route::put('apps/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@update']);
        Route::put('apps/{id}/strict', ['as' => 'admin.api.apps.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@updateStrict']);
        Route::delete('apps/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('apps', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('apps/{id}/force', ['as' => 'admin.api.apps.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
        Route::delete('apps/force', ['as' => 'admin.api.apps.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
    });
});

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        Route::get('apps', ['as' => 'api.v1.apps', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@pageData']);
        Route::get('apps/list', ['as' => 'api.v1.apps.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@list']);
        Route::get('apps/search', ['as' => 'api.v1.apps.search', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@search']);
        Route::get('apps/{id}', ['as' => 'api.v1.apps.single', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@getSingleRecord']);
        Route::post('apps/{id}/duplicate', ['as' => 'api.v1.apps.duplicate', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@duplicate']);
        Route::post('apps/restore', ['as' => 'api.v1.apps.restore', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@restore']);
        Route::post('apps/merge', ['as' => 'api.v1.apps.merge', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@merge']);
        Route::post('apps', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@create']);
        Route::put('apps/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@update']);
        Route::put('apps/{id}/strict', ['as' => 'api.v1.apps.update.strict', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@updateStrict']);
        Route::delete('apps/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('apps', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('apps/{id}/force', ['as' => 'api.v1.apps.force', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
        Route::delete('apps/force', ['as' => 'api.v1.apps.force.multi', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
    });
});

