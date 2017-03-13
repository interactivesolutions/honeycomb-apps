<?php

namespace interactivesolutions\honeycombapps\app\models\apps;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class Roles extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_apps_acl_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'slug'];

}
