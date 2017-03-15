<?php

//honeycomb-apps/src/app/routes/admin/00_routes.apps.tokens.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/tokens', ['as' => 'admin.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@adminView']);

    Route::group(['prefix' => 'api/apps/tokens'], function ()
    {
        Route::get('/', ['as' => 'admin.api.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'admin.api.apps.tokens.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listUpdate']);
        Route::get('list', ['as' => 'admin.api.apps.tokens.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@list']);
        Route::get('search', ['as' => 'admin.api.apps.tokens.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listSearch']);
        Route::get('{id}', ['as' => 'admin.api.apps.tokens.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'admin.api.apps.tokens.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@duplicate']);
        Route::post('restore', ['as' => 'admin.api.apps.tokens.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@restore']);
        Route::post('merge', ['as' => 'admin.api.apps.tokens.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCTokensController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@update']);
        Route::put('{id}/strict', ['as' => 'admin.api.apps.tokens.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('{id}/force', ['as' => 'admin.api.apps.tokens.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
        Route::delete('force', ['as' => 'admin.api.apps.tokens.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
    });
});


//honeycomb-apps/src/app/routes/admin/routes.apps.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps', ['as' => 'admin.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@adminView']);

    Route::group(['prefix' => 'api/apps'], function ()
    {
        Route::get('/', ['as' => 'admin.api.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'admin.api.apps.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listUpdate']);
        Route::get('list', ['as' => 'admin.api.apps.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@list']);
        Route::get('search', ['as' => 'admin.api.apps.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listSearch']);
        Route::get('{id}', ['as' => 'admin.api.apps.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'admin.api.apps.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@duplicate']);
        Route::post('restore', ['as' => 'admin.api.apps.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@restore']);
        Route::post('merge', ['as' => 'admin.api.apps.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@update']);
        Route::put('{id}/strict', ['as' => 'admin.api.apps.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('{id}/force', ['as' => 'admin.api.apps.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
        Route::delete('force', ['as' => 'admin.api.apps.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
    });
});




//honeycomb-apps/src/app/routes/api/00_routes.apps.auth.php


Route::group(['prefix' => 'api', 'middleware' => ['web']], function () {
    Route::get('login', ['as' => 'api.v1.api.login', 'uses' => 'HCAppsController@showLogin']);
    Route::post('login', ['as' => 'api.v1.api.login', 'uses' => 'HCAppsController@login']);

    Route::get ('logout', ['as' => 'api.v1.api.logout', 'middleware' => 'auth-apps', 'uses' => 'HCAppsController@logout']);

});

//honeycomb-apps/src/app/routes/api/00_routes.apps.tokens.php


Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::get('apps/tokens', ['as' => 'api.v1.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@adminView']);

    Route::group(['prefix' => 'v1/apps/tokens'], function ()
    {
        Route::get('/', ['as' => 'api.v1.api.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.api.apps.tokens.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listUpdate']);
        Route::get('list', ['as' => 'api.v1.api.apps.tokens.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@list']);
        Route::get('search', ['as' => 'api.v1.api.apps.tokens.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@listSearch']);
        Route::get('{id}', ['as' => 'api.v1.api.apps.tokens.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.api.apps.tokens.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.api.apps.tokens.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@restore']);
        Route::post('merge', ['as' => 'api.v1.api.apps.tokens.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCTokensController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@update']);
        Route::put('{id}/strict', ['as' => 'api.v1.api.apps.tokens.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.api.apps.tokens.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.api.apps.tokens.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
    });
});


//honeycomb-apps/src/app/routes/api/routes.apps.php


Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::get('apps', ['as' => 'api.v1.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@adminView']);

    Route::group(['prefix' => 'v1/apps'], function ()
    {
        Route::get('/', ['as' => 'api.v1.api.apps', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.api.apps.list.update', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listUpdate']);
        Route::get('list', ['as' => 'api.v1.api.apps.list', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@list']);
        Route::get('search', ['as' => 'api.v1.api.apps.search', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@listSearch']);
        Route::get('{id}', ['as' => 'api.v1.api.apps.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_list'], 'uses' => 'HCAppsController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.api.apps.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.api.apps.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@restore']);
        Route::post('merge', ['as' => 'api.v1.api.apps.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@merge']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_create'], 'uses' => 'HCAppsController@create']);

        Route::put('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@update']);
        Route::put('{id}/strict', ['as' => 'api.v1.api.apps.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_update'], 'uses' => 'HCAppsController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_delete'], 'uses' => 'HCAppsController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.api.apps.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.api.apps.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_force_delete'], 'uses' => 'HCAppsController@forceDelete']);
    });
});

