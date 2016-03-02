<?php namespace Fes\Ticker;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
        'Fes\Ticker\Components\TickerList' => 'tickerList'
      ];
    }

    public function registerSettings()
    {
    }
}
