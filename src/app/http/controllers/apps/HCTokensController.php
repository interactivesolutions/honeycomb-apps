<?php namespace interactivesolutions\honeycombapps\app\http\controllers\apps;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombapps\app\models\apps\Tokens;
use interactivesolutions\honeycombapps\app\validators\apps\HCTokensValidator;

class HCTokensController extends HCBaseController
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
            'title'       => trans('HCApps::apps_tokens.page_title'),
            'listURL'     => route('admin.api.apps.tokens'),
            'newFormUrl'  => route('admin.api.form-manager', ['apps-tokens-new']),
            'editFormUrl' => route('admin.api.form-manager', ['apps-tokens-edit']),
            'imagesUrl'   => route('resource.get', ['/']),
            'headers'     => $this->getAdminListHeader(),
        ];

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_create'))
            $config['actions'][] = 'new';

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if ($this->user()->can('interactivesolutions_honeycomb_apps_apps_tokens_delete'))
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
            'value'           => [
                "type"  => "text",
                "label" => trans('HCApps::apps_tokens.value'),
            ],
            'app_id'          => [
                "type"  => "text",
                "label" => trans('HCApps::apps_tokens.app_id'),
            ],
            'expiration_date' => [
                "type"  => "text",
                "label" => trans('HCApps::apps_tokens.expiration_date'),
            ],
            'last_used'       => [
                "type"  => "text",
                "label" => trans('HCApps::apps_tokens.last_used'),
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

        $record = Tokens::create(array_get($data, 'record'));

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
        $record = Tokens::findOrFail($id);

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
        Tokens::where('id', $id)->update(request()->all());

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
        Tokens::destroy($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __forceDelete(array $list)
    {
        Tokens::onlyTrashed()->whereIn('id', $list)->forceDelete();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __restore(array $list)
    {
        Tokens::whereIn('id', $list)->restore();
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
            $select = Tokens::getFillableFields();

        $list = Tokens::with($with)->select($select)
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
                $query->where('value', 'LIKE', '%' . $parameter . '%')
                    ->orWhere('app_id', 'LIKE', '%' . $parameter . '%')
                    ->orWhere('expiration_date', 'LIKE', '%' . $parameter . '%')
                    ->orWhere('last_used', 'LIKE', '%' . $parameter . '%');
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
        (new HCTokensValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.value', array_get($_data, 'value'));
        array_set($data, 'record.app_id', array_get($_data, 'app_id'));
        array_set($data, 'record.expiration_date', array_get($_data, 'expiration_date'));
        array_set($data, 'record.last_used', array_get($_data, 'last_used'));

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

        $select = Tokens::getFillableFields();

        $record = Tokens::with($with)
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
