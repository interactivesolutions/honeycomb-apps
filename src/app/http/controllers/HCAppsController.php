<?php namespace interactivesolutions\honeycombapps\app\http\controllers;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombapps\app\models\HCApps;
use interactivesolutions\honeycombapps\app\validators\HCAppsValidator;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;

class HCAppsController extends HCBaseController
{

    //TODO recordsPerPage setting

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex ()
    {
        $config = [
            'title'       => trans ('HCApps::apps.page_title'),
            'listURL'     => route ('admin.api.apps'),
            'newFormUrl'  => route ('admin.api.form-manager', ['apps-new']),
            'editFormUrl' => route ('admin.api.form-manager', ['apps-edit']),
            'imagesUrl'   => route ('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader (),
        ];

        if (auth()->user ()->can ('interactivesolutions_honeycomb_apps_apps_create'))
            $config['actions'][] = 'new';

        if (auth()->user ()->can ('interactivesolutions_honeycomb_apps_apps_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user ()->can ('interactivesolutions_honeycomb_apps_apps_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters']   = $this->getFilters ();

        return view ('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    public function getAdminListHeader ()
    {
        return [
            'name' => [
                "type"  => "text",
                "label" => trans ('HCApps::apps.name'),
            ],

        ];
    }

    /**
     * Generating filters required for admin view
     *
     * @return array
     */
    public function getFilters ()
    {
        $filters = [];

        return $filters;
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    public function createQuery (array $select = null)
    {
        $with = [];

        if ($select == null)
            $select = HCApps::getFillableFields ();

        $list = HCApps::with ($with)->select ($select)
            // add filters
                      ->where (function ($query) use ($select) {
                $query = $this->getRequestParameters ($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted ($list);

        // add search items
        $list = $this->search ($list);

        // ordering data
        $list = $this->orderData ($list, $select);

        return $list;
    }

    /**
     * List search elements
     * @param Builder $query
     * @param string $phrase
     * @return Builder
     */
    protected function searchQuery(Builder $query, string $phrase)
    {
        return $query->where (function (Builder $query) use ($phrase) {
            $query->where ('name', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Create item
     *
     * @param array|null $data
     * @return mixed
     */
    protected function __apiStore (array $data = null)
    {
        if (is_null ($data))
            $data = $this->getInputData ();

        $record = HCApps::create (array_get ($data, 'record'));

        return $this->apiShow ($record->id);
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData ()
    {
        (new HCAppsValidator())->validateForm ();

        $_data = request ()->all ();

        array_set ($data, 'record.name', array_get ($_data, 'name'));

        return $data;
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function apiShow (string $id)
    {
        $with = [];

        $select = HCApps::getFillableFields ();

        $record = HCApps::with ($with)
                        ->select ($select)
                        ->where ('id', $id)
                        ->firstOrFail ();

        return $record;
    }

    /**
     * Updates existing item based on ID
     *
     * @param $id
     * @return mixed
     */
    protected function __apiUpdate (string $id)
    {
        $record = HCApps::findOrFail ($id);

        $data = $this->getInputData ();

        $record->update (array_get ($data, 'record'));

        return $this->apiShow ($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __apiUpdateStrict (string $id)
    {
        HCApps::where ('id', $id)->update (request ()->all ());

        return $this->apiShow ($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __apiDestroy (array $list)
    {
        HCApps::destroy ($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __apiForceDelete (array $list)
    {
        HCApps::onlyTrashed ()->whereIn ('id', $list)->forceDelete ();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __apiRestore (array $list)
    {
        HCApps::whereIn ('id', $list)->restore ();
    }
}
