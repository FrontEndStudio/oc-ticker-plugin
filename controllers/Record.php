<?php namespace Fes\Ticker\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Record extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'fes.ticker.records'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Fes.Ticker', 'main-menu-item');
    }
}
