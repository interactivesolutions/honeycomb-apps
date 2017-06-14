<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('apps/tokens', ['as' => 'admin.apps.tokens.index', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCAppsTokensController@adminIndex']);

    Route::group(['prefix' => 'api/apps/tokens'], function ()
    {
        Route::get('/', ['as' => 'admin.api.apps.tokens', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCAppsTokensController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCAppsTokensController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCAppsTokensController@apiDestroy']);

        Route::post('restore', ['as' => 'admin.api.apps.tokens.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCAppsTokensController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.apps.tokens.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create', 'acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCAppsTokensController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.apps.tokens.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCAppsTokensController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['as' => 'admin.api.apps.tokens.single', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCAppsTokensController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCAppsTokensController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCAppsTokensController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.apps.tokens.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCAppsTokensController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.apps.tokens.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCAppsTokensController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.apps.tokens.force', 'middleware' => ['acl:interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCAppsTokensController@apiForceDelete']);
        });
    });
});

