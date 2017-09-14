<?php namespace Tuke\Base\Plugin\Facades;

use Illuminate\Support\Facades\Facade;

class PluginFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Tuke\Base\Plugin\Support\Plugin::class;
    }
}
