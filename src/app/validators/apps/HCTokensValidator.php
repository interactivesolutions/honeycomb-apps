<?php namespace interactivesolutions\honeycombapps\app\validators\apps;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class HCTokensValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'app_id'          => 'required',
            'expiration_date' => 'required',

        ];
    }
}