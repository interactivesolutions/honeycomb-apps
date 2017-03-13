<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/roles', ['as' => 'admin.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps/roles', ['as' => 'admin.api.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@pageData']);
        Route::get('apps/roles/list', ['as' => 'admin.api.apps.roles.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@list']);
        Route::get('apps/roles/search', ['as' => 'admin.api.apps.roles.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@search']);
        Route::get('apps/roles/{id}', ['as' => 'admin.api.apps.roles.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@getSingleRecord']);
        Route::post('apps/roles/{id}/duplicate', ['as' => 'admin.api.apps.roles.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@duplicate']);
        Route::post('apps/roles/restore', ['as' => 'admin.api.apps.roles.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@restore']);
        Route::post('apps/roles/merge', ['as' => 'admin.api.apps.roles.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@merge']);
        Route::post('apps/roles', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_create'], 'uses' => 'apps\\RolesController@create']);
        Route::put('apps/roles/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@update']);
        Route::put('apps/roles/{id}/strict', ['as' => 'admin.api.apps.roles.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@updateStrict']);
        Route::delete('apps/roles/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\RolesController@delete']);
        Route::delete('apps/roles', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\RolesController@delete']);
        Route::delete('apps/roles/{id}/force', ['as' => 'admin.api.apps.roles.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\RolesController@forceDelete']);
        Route::delete('apps/roles/force', ['as' => 'admin.api.apps.roles.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\RolesController@forceDelete']);
    });
});

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        Route::get('apps/roles', ['as' => 'api.v1.apps.roles', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@pageData']);
        Route::get('apps/roles/list', ['as' => 'api.v1.apps.roles.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@list']);
        Route::get('apps/roles/search', ['as' => 'api.v1.apps.roles.search', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@search']);
        Route::get('apps/roles/{id}', ['as' => 'api.v1.apps.roles.single', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\RolesController@getSingleRecord']);
        Route::post('apps/roles/{id}/duplicate', ['as' => 'api.v1.apps.roles.duplicate', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@duplicate']);
        Route::post('apps/roles/restore', ['as' => 'api.v1.apps.roles.restore', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@restore']);
        Route::post('apps/roles/merge', ['as' => 'api.v1.apps.roles.merge', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@merge']);
        Route::post('apps/roles', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_create'], 'uses' => 'apps\\RolesController@create']);
        Route::put('apps/roles/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@update']);
        Route::put('apps/roles/{id}/strict', ['as' => 'api.v1.apps.roles.update.strict', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\RolesController@updateStrict']);
        Route::delete('apps/roles/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\RolesController@delete']);
        Route::delete('apps/roles', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\RolesController@delete']);
        Route::delete('apps/roles/{id}/force', ['as' => 'api.v1.apps.roles.force', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\RolesController@forceDelete']);
        Route::delete('apps/roles/force', ['as' => 'api.v1.apps.roles.force.multi', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\RolesController@forceDelete']);
    });
});
