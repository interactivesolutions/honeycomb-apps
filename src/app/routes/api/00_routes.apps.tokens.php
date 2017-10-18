<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function() {
    Route::group(['prefix' => 'v1/apps/tokens'], function() {
        Route::get('/', [
            'as' => 'api.v1.apps.tokens',
            'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'],
            'uses' => 'apps\\HCAppsTokensController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_create'],
            'uses' => 'apps\\HCAppsTokensController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_delete'],
            'uses' => 'apps\\HCAppsTokensController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('/', [
                'as' => 'api.v1.apps.tokens.list',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'],
                'uses' => 'apps\\HCAppsTokensController@apiIndex',
            ]);
            Route::get('{timestamp}', [
                'as' => 'api.v1.apps.tokens.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_apps_apps_tokens_list'],
                'uses' => 'apps\\HCAppsTokensController@apiIndexSync',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.apps.tokens.restore',
            'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'],
            'uses' => 'apps\\HCAppsTokensController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.apps.tokens.merge',
            'middleware' => [
                'acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_create',
                'acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update',
            ],
            'uses' => 'apps\\HCAppsTokensController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.apps.tokens.force.multi',
            'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_force_delete'],
            'uses' => 'apps\\HCAppsTokensController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.apps.tokens.single',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'],
                'uses' => 'apps\\HCAppsTokensController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'],
                'uses' => 'apps\\HCAppsTokensController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_delete'],
                'uses' => 'apps\\HCAppsTokensController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.apps.tokens.update.strict',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'],
                'uses' => 'apps\\HCAppsTokensController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.apps.tokens.duplicate',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_create'],
                'uses' => 'apps\\HCAppsTokensController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.apps.tokens.force',
                'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_force_delete'],
                'uses' => 'apps\\HCAppsTokensController@apiForceDelete',
            ]);
        });
    });
});

