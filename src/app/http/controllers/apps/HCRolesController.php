<?php namespace interactivesolutions\honeycombapps\app\http\controllers\apps;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombapps\app\models\apps\Roles;
use interactivesolutions\honeycombapps\app\validators\apps\RolesValidator;

class HCRolesController extends HCBaseController
{

    //TODO recordsPerPage setting

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminView()
    {
        $config = [
            'title'       => trans('HCApps::apps_roles.page_title'),
            'listURL'     => route('admin.api.apps.roles'),
            'newFormUrl'  => route('admin.api.form-manager', ['apps-roles-new']),
            'editFormUrl' => route('admin.api.form-manager', ['apps-roles-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_roles_create'))
            $config['actions'][] = 'new';

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_roles_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_roles_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();

        return view('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    public function getAdminListHeader()
    {
        return [
            'name' => [
                "type"  => "text",
                "label" => trans('HCApps::apps_roles.name'),
            ],
            'slug' => [
                "type"  => "text",
                "label" => trans('HCApps::apps_roles.slug'),
            ],

        ];
    }

    /**
     * Create item
     *
     * @param array|null $data
     * @return mixed
     */
    protected function __create(array $data = null)
    {
        if (is_null($data))
            $data = $this->getInputData();

        $record = Roles::create(array_get($data, 'record'));

        return $this->getSingleRecord($record->id);
    }

    /**
     * Updates existing item based on ID
     *
     * @param $id
     * @return mixed
     */
    protected function __update(string $id)
    {
        $record = Roles::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record'));

        return $this->getSingleRecord($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __updateStrict(string $id)
    {
        Roles::where('id', $id)->update(request()->all());

        return $this->getSingleRecord($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __delete(array $list)
    {
        Roles::destroy($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __forceDelete(array $list)
    {
        Roles::onlyTrashed()->whereIn('id', $list)->forceDelete();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __restore(array $list)
    {
        Roles::whereIn('id', $list)->restore();
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    public function createQuery(array $select = null)
    {
        $with = [];

        if ($select == null)
            $select = Roles::getFillableFields();

        $list = Roles::with($with)->select($select)
            // add filters
            ->where(function ($query) use ($select) {
                $query = $this->getRequestParameters($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted($list);

        // add search items
        $list = $this->listSearch($list);

        // ordering data
        $list = $this->orderData($list, $select);

        return $list;
    }

    /**
     * List search elements
     * @param $list
     * @return mixed
     */
    protected function listSearch(Builder $list)
    {
        if (request()->has('q')) {
            $parameter = request()->input('q');

            $list = $list->where(function ($query) use ($parameter) {
                $query->where('name', 'LIKE', '%' . $parameter . '%')
                    ->orWhere('slug', 'LIKE', '%' . $parameter . '%');
            });
        }

        return $list;
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData()
    {
        (new RolesValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.slug', array_get($_data, 'slug'));

        return $data;
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function getSingleRecord(string $id)
    {
        $with = [];

        $select = Roles::getFillableFields();

        $record = Roles::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }

    /**
     * Generating filters required for admin view
     *
     * @return array
     */
    public function getFilters()
    {
        $filters = [];

        return $filters;
    }
}
