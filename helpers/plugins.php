<?php

use Illuminate\Support\Collection;
use Tuke\Base\Plugin\Facades\PluginsFacade;

if (!function_exists('tuke_plugins')) {
    /**
     * @return \Tuke\Base\Plugin\Support\PluginsSupport
     */
    function tuke_plugins()
    {
        return PluginsFacade::getFacadeRoot();
    }
}

if (!function_exists('get_plugin')) {
    /**
     * @param string
     * @return Collection
     */
    function get_plugin($alias = null)
    {
        if ($alias) {
            return PluginsFacade::findByAlias($alias);
        }
        return PluginsFacade::getAllPlugins();
    }
}

if (!function_exists('save_plugin_information')) {
    /**
     * @param $alias
     * @param array $data
     * @return bool
     */
    function save_plugin_information($alias, array $data)
    {
        return PluginsFacade::savePlugin($alias, $data);
    }
}
