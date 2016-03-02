<?php namespace Fes\Ticker\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Lang;
use Exception;
use SystemException;

class TickerList extends ComponentBase
{

    public $records;
    public $noRecordsMessage;
    public $extraData;

    public function componentDetails()
    {
        return [
            'name'        => 'fes.ticker::lang.components.list_title',
            'description' => 'fes.ticker::lang.components.list_description'
        ];
    }

    //
    // Properties
    //

    public function defineProperties()
    {
        return [
            'sortColumn' => [
                'title'       => 'fes.ticker::lang.components.list_sort_column',
                'description' => 'fes.ticker::lang.components.list_sort_column_description',
                'type'        => 'autocomplete',
                'group'       => 'fes.birthday::lang.components.list_sorting',
                'showExternalParam' => false
            ],
            'sortDirection' => [
                'title'       => 'fes.ticker::lang.components.list_sort_direction',
                'type'        => 'dropdown',
                'showExternalParam' => false,
                'group'       => 'fes.ticker::lang.components.list_sorting',
                'options'     => [
                    'asc'     => 'fes.ticker::lang.components.list_order_direction_asc',
                    'desc'    => 'fes.ticker::lang.components.list_order_direction_desc'
                ]
            ]
        ];
    }

    public function getSortColumnOptions()
    {
        $columnNames = ['title', 'content', 'sort_order'];
        $result = [];

        foreach ($columnNames as $columnName) {
            $result[$columnName] = $columnName;
        }

        return $result;

    }

    //
    // Rendering and processing
    //

    public function onRun()
    {

        $this->prepareVars();
        $this->records = $this->page['records'] = $this->listRecords();
    }

    public function onRender()
    {
        $this->extraData = $this->page['extraData'] = $this->property('extraData');
    }

    protected function prepareVars()
    {

        $this->noRecordsMessage = $this->page['noRecordsMessage'] = Lang::get($this->property('noRecordsMessage'));
    }

    protected function listRecords()
    {
        $modelClassName = 'Fes\Ticker\Models\Record';
        $model = new $modelClassName();
        $model = $this->sort($model);
        return $model->where('status', '1')->get();
    }

    protected function sort($model)
    {

        $sortColumn = trim($this->property('sortColumn'));

        if (!strlen($sortColumn)) {
            return;
        }

        $sortDirection = trim($this->property('sortDirection'));

        if ($sortDirection !== 'desc') {
            $sortDirection = 'asc';
        }

        return $model->orderBy($sortColumn, $sortDirection);
    }
}
