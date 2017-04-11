<?php namespace interactivesolutions\honeycombapps\app\http\controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombapps\app\models\apps\Tokens;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombapps\app\models\HCApps;
use interactivesolutions\honeycombapps\app\validators\HCAppsValidator;


class HCAppsController extends HCBaseController
{

    //TODO recordsPerPage setting

    public function showLogin()
    {
        return view('HCApps::auth.login');
    }

    public function login()
    {
        $app = HCApps::where('name', request()->name)->where('secret', request()->secret)->first();
        if ($app && $app->active == 1) {

            $token = str_random(255);

            Tokens::create([
                'value'      => $token,
                'app_name'     => request()->name,
                'expires_at' => Carbon::now()->addMinutes(env('HC_API_TOKEN_LIFESPAN', 86400))->toDateTimeString()
            ]);

            return response(['success' => true, 'token' => $token]);
        }

        return response(['success' => false, 'message' => 'AUTH-002 - ' . trans('HCApps::users.errors.login')]);
    }

    public function logout()
    {
        Tokens::where('value', request()->token)->delete();
    }

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminView()
    {
        $config = [
            'title'       => trans('HCApps::apps.page_title'),
            'listURL'     => route('admin.api.apps'),
            'newFormUrl'  => route('admin.api.form-manager', ['apps-new']),
            'editFormUrl' => route('admin.api.form-manager', ['apps-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_create'))
            $config['actions'][] = 'new';

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_delete'))
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
                "label" => trans('HCApps::apps.name'),
            ],
            'secret' => [
                "type"  => "text",
                "label" => trans('HCApps::apps.secret'),
            ],
            'active'       => [
                "type"  => "checkbox",
                "label" => trans('HCApps::apps.active'),
                "url"   => route('admin.api.apps.update.strict', 'id')
                ]
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

        $record = HCApps::create(array_get($data, 'record'));

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
        $record = HCApps::findOrFail($id);

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
        HCApps::where('id', $id)->update(request()->all());

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
        HCApps::destroy($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __forceDelete(array $list)
    {
        HCApps::onlyTrashed()->whereIn('id', $list)->forceDelete();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __restore(array $list)
    {
        HCApps::whereIn('id', $list)->restore();
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
            $select = HCApps::getFillableFields();

        $list = HCApps::with($with)->select($select)
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
                    ->orWhere('secret', 'LIKE', '%' . $parameter . '%');
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
        (new HCAppsValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.secret', array_get($_data, 'secret'));

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

        $select = HCApps::getFillableFields();

        $record = HCApps::with($with)
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
