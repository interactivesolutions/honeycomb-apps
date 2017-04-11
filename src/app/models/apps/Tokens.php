<?php

namespace interactivesolutions\honeycombapps\app\models\apps;

use interactivesolutions\honeycombcore\models\HCModel;

class Tokens extends HCModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_apps_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'app_name', 'expires_at', 'last_used'];

    /**
     * We set different primary key
     *
     * @var string
     */
    public $primaryKey  = 'value';

}
