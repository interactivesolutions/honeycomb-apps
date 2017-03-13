<?php

namespace interactivesolutions\honeycombapps\app\forms\apps;

class HCRolesForm
{
    // name of the form
    protected $formID = 'apps-roles';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm(bool $edit = false)
    {
        $form = [
            'storageURL' => route('admin.api.apps.roles'),
            'buttons'    => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCCoreUI::core.button.submit'),
                    "type"  => "submit",
                ],
            ],
            'structure'  => [
                [
                    "type"            => "singleLine",
                    "fieldID"         => "name",
                    "label"           => trans("HCApps::apps_roles.name"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ], [
                    "type"            => "singleLine",
                    "fieldID"         => "slug",
                    "label"           => trans("HCApps::apps_roles.slug"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                ],
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = []; //TOTO implement honeycomb-languages package

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}