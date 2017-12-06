<?php namespace interactivesolutions\honeycombapps\app\http\controllers\apps;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombapps\app\models\apps\HCAppsTokens;
use interactivesolutions\honeycombapps\app\validators\apps\HCAppsTokensValidator;
use InteractiveSolutions\HoneycombCore\Http\Controllers\HCBaseController;

class HCAppsTokensController extends HCBaseController
{

    //TODO recordsPerPage setting

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex()
    {
        $config = [
            'title' => trans('HCApps::apps_tokens.page_title'),
            'listURL' => route('admin.api.apps.tokens'),
            'newFormUrl' => route('admin.api.form-manager', ['apps-tokens-new']),
            'editFormUrl' => route('admin.api.form-manager', ['apps-tokens-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        if (auth()->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_create')) {
            $config['actions'][] = 'new';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_delete')) {
            $config['actions'][] = 'delete';
        }

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
            'expires_at' => [
                "type" => "text",
                "label" => trans('HCApps::apps_tokens.expires_at'),
            ],
            'app_id' => [
                "type" => "text",
                "label" => trans('HCApps::apps_tokens.app_id'),
            ],

        ];
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

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    public function createQuery(array $select = null)
    {
        $with = [];

        if ($select == null) {
            $select = HCAppsTokens::getFillableFields();
        }

        $list = HCAppsTokens::with($with)
            ->select($select)
            ->where(function($query) use ($select) {
                $query = $this->getRequestParameters($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted($list);

        // add search items
        $list = $this->search($list);

        // ordering data
        $list = $this->orderData($list, $select);

        return $list;
    }

    /**
     * List search elements
     * @param Builder $query
     * @param string $phrase
     * @return Builder
     */
    protected function searchQuery(Builder $query, string $phrase): Builder
    {
        return $query->where(function(Builder $query) use ($phrase) {
            $query->where('expires_at', 'LIKE', '%' . $phrase . '%')
                ->orWhere('token', 'LIKE', '%' . $phrase . '%')
                ->orWhere('app_id', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Create item
     *
     * @return mixed
     */
    protected function __apiStore()
    {
        $data = $this->getInputData();

        $record = HCAppsTokens::create(array_get($data, 'record'));

        return $this->apiShow($record->id);
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData()
    {
        (new HCAppsTokensValidator())->validateForm();

        $_data = request()->all();

        $token = array_get($_data, 'token');

        if (strlen($token) != 255) {
            $token = random_str(255);
        }

        array_set($data, 'record.expires_at', array_get($_data, 'expires_at'));
        array_set($data, 'record.token', $token);
        array_set($data, 'record.app_id', array_get($_data, 'app_id'));

        return $data;
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function apiShow(string $id)
    {
        $with = [];

        $select = HCAppsTokens::getFillableFields();

        $record = HCAppsTokens::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }

    /**
     * Updates existing item based on ID
     *
     * @param $id
     * @return mixed
     */
    protected function __apiUpdate(string $id)
    {
        $record = HCAppsTokens::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record'));

        return $this->apiShow($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __apiUpdateStrict(string $id)
    {
        HCAppsTokens::where('id', $id)->update(request()->all());

        return $this->apiShow($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiDestroy(array $list)
    {
        HCAppsTokens::destroy($list);

        return hcSuccess();
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed
     */
    protected function __apiForceDelete(array $list)
    {
        HCAppsTokens::onlyTrashed()->whereIn('id', $list)->forceDelete();

        return hcSuccess();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed
     */
    protected function __apiRestore(array $list)
    {
        HCAppsTokens::whereIn('id', $list)->restore();

        return hcSuccess();
    }
}
