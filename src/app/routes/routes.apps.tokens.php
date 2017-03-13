<?php

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

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth-apps']], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        Route::get('apps/tokens', ['as' => 'api.v1.apps.tokens', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@pageData']);
        Route::get('apps/tokens/list', ['as' => 'api.v1.apps.tokens.list', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@list']);
        Route::get('apps/tokens/search', ['as' => 'api.v1.apps.tokens.search', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@search']);
        Route::get('apps/tokens/{id}', ['as' => 'api.v1.apps.tokens.single', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_list'], 'uses' => 'apps\\HCTokensController@getSingleRecord']);
        Route::post('apps/tokens/{id}/duplicate', ['as' => 'api.v1.apps.tokens.duplicate', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@duplicate']);
        Route::post('apps/tokens/restore', ['as' => 'api.v1.apps.tokens.restore', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@restore']);
        Route::post('apps/tokens/merge', ['as' => 'api.v1.apps.tokens.merge', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@merge']);
        Route::post('apps/tokens', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_create'], 'uses' => 'apps\\HCTokensController@create']);
        Route::put('apps/tokens/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@update']);
        Route::put('apps/tokens/{id}/strict', ['as' => 'api.v1.apps.tokens.update.strict', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_update'], 'uses' => 'apps\\HCTokensController@updateStrict']);
        Route::delete('apps/tokens/{id}', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('apps/tokens', ['middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_delete'], 'uses' => 'apps\\HCTokensController@delete']);
        Route::delete('apps/tokens/{id}/force', ['as' => 'api.v1.apps.tokens.force', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
        Route::delete('apps/tokens/force', ['as' => 'api.v1.apps.tokens.force.multi', 'middleware' => ['acl-apps:api_v1_interactivesolutions_honeycomb_apps_apps_tokens_force_delete'], 'uses' => 'apps\\HCTokensController@forceDelete']);
    });
});
