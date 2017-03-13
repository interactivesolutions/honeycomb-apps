<?php

namespace interactivesolutions\honeycombapps\app\models\apps;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class AppsRolesConnections extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_apps_acl_apps_roles_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['app_id', 'role_id'];

}
