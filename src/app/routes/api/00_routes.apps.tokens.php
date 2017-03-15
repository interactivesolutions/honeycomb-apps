<?php

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
