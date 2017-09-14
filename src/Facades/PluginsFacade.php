<?php namespace Tuke\Base\Plugin\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Plugin\Support\PluginsSupport;

class PluginsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PluginsSupport::class;
    }
}
