<?php

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
