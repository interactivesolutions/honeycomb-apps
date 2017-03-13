<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/permissions', ['as' => 'admin.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps/permissions', ['as' => 'admin.api.apps.permissions', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@pageData']);
        Route::get('apps/permissions/list', ['as' => 'admin.api.apps.permissions.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@list']);
        Route::get('apps/permissions/search', ['as' => 'admin.api.apps.permissions.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@search']);
        Route::get('apps/permissions/{id}', ['as' => 'admin.api.apps.permissions.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_list'], 'uses' => 'apps\\HCPermissionsController@getSingleRecord']);
        Route::post('apps/permissions/{id}/duplicate', ['as' => 'admin.api.apps.permissions.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@duplicate']);
        Route::post('apps/permissions/restore', ['as' => 'admin.api.apps.permissions.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@restore']);
        Route::post('apps/permissions/merge', ['as' => 'admin.api.apps.permissions.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@merge']);
        Route::post('apps/permissions', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_create'], 'uses' => 'apps\\HCPermissionsController@create']);
        Route::put('apps/permissions/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@update']);
        Route::put('apps/permissions/{id}/strict', ['as' => 'admin.api.apps.permissions.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_update'], 'uses' => 'apps\\HCPermissionsController@updateStrict']);
        Route::delete('apps/permissions/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\HCPermissionsController@delete']);
        Route::delete('apps/permissions', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_delete'], 'uses' => 'apps\\HCPermissionsController@delete']);
        Route::delete('apps/permissions/{id}/force', ['as' => 'admin.api.apps.permissions.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\HCPermissionsController@forceDelete']);
        Route::delete('apps/permissions/force', ['as' => 'admin.api.apps.permissions.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_permissions_force_delete'], 'uses' => 'apps\\HCPermissionsController@forceDelete']);
    });
});
