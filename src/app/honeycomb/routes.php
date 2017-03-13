<?php

//interactivesolutions/honeycomb-apps/src/app/routes/routes.apps.permissions.php


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


//interactivesolutions/honeycomb-apps/src/app/routes/routes.apps.roles.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/roles', ['as' => 'admin.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps/roles', ['as' => 'admin.api.apps.roles', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@pageData']);
        Route::get('apps/roles/list', ['as' => 'admin.api.apps.roles.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@list']);
        Route::get('apps/roles/search', ['as' => 'admin.api.apps.roles.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@search']);
        Route::get('apps/roles/{id}', ['as' => 'admin.api.apps.roles.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_list'], 'uses' => 'apps\\HCRolesController@getSingleRecord']);
        Route::post('apps/roles/{id}/duplicate', ['as' => 'admin.api.apps.roles.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@duplicate']);
        Route::post('apps/roles/restore', ['as' => 'admin.api.apps.roles.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@restore']);
        Route::post('apps/roles/merge', ['as' => 'admin.api.apps.roles.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@merge']);
        Route::post('apps/roles', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_create'], 'uses' => 'apps\\HCRolesController@create']);
        Route::put('apps/roles/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@update']);
        Route::put('apps/roles/{id}/strict', ['as' => 'admin.api.apps.roles.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_update'], 'uses' => 'apps\\HCRolesController@updateStrict']);
        Route::delete('apps/roles/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\HCRolesController@delete']);
        Route::delete('apps/roles', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_delete'], 'uses' => 'apps\\HCRolesController@delete']);
        Route::delete('apps/roles/{id}/force', ['as' => 'admin.api.apps.roles.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\HCRolesController@forceDelete']);
        Route::delete('apps/roles/force', ['as' => 'admin.api.apps.roles.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_roles_force_delete'], 'uses' => 'apps\\HCRolesController@forceDelete']);
    });
});


//interactivesolutions/honeycomb-apps/src/app/routes/routes.apps.tokens.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/tokens', ['as' => 'admin.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('apps/tokens', ['as' => 'admin.api.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@pageData']);
        Route::get('apps/tokens/list', ['as' => 'admin.api.apps.tokens.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@list']);
        Route::get('apps/tokens/search', ['as' => 'admin.api.apps.tokens.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@search']);
        Route::get('apps/tokens/{id}', ['as' => 'admin.api.apps.tokens.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@getSingleRecord']);
        Route::post('apps/tokens/{id}/duplicate', ['as' => 'admin.api.apps.tokens.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@duplicate']);
        Route::post('apps/tokens/restore', ['as' => 'admin.api.apps.tokens.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@restore']);
        Route::post('apps/tokens/merge', ['as' => 'admin.api.apps.tokens.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@merge']);
        Route::post('apps/tokens', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCTokensController@create']);
        Route::put('apps/tokens/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@update']);
        Route::put('apps/tokens/{id}/strict', ['as' => 'admin.api.apps.tokens.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@updateStrict']);
        Route::delete('apps/tokens/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('apps/tokens', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('apps/tokens/{id}/force', ['as' => 'admin.api.apps.tokens.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
        Route::delete('apps/tokens/force', ['as' => 'admin.api.apps.tokens.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
    });
});

