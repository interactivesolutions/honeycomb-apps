<?php namespace interactivesolutions\honeycombapps\app\validators\apps;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class PermissionsValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required',
'controller' => 'required',
'action' => 'required',

        ];
    }
}