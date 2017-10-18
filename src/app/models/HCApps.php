<?php

namespace interactivesolutions\honeycombapps\app\models;


use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

class HCApps extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_apps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];
}