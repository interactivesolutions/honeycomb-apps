<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/roles', ['as' => 'admin.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@adminView']);

    Route::group(['prefix' => 'api/apps/roles'], function ()
    {
        Route::get('/', ['as' => 'admin.api.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'admin.api.apps.roles.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@listUpdate']);
        Route::get('list', ['as' => 'admin.api.apps.roles.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@list']);
        Route::get('search', ['as' => 'admin.api.apps.roles.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@listSearch']);
        Route::get('{id}', ['as' => 'admin.api.apps.roles.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'admin.api.apps.roles.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@duplicate']);
        Route::post('restore', ['as' => 'admin.api.apps.roles.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@restore']);
        Route::post('merge', ['as' => 'admin.api.apps.roles.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_create'], 'uses' => 'apps\\HCRolesController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@update']);
        Route::put('{id}/strict', ['as' => 'admin.api.apps.roles.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\HCRolesController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\HCRolesController@delete']);
        Route::delete('{id}/force', ['as' => 'admin.api.apps.roles.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\HCRolesController@forceDelete']);
        Route::delete('force', ['as' => 'admin.api.apps.roles.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\HCRolesController@forceDelete']);
    });
});
