<?php

if (!function_exists('tuke_plugins_path')) {
    /**
     * @param string $path
     * @return string
     */
    function tuke_plugins_path($path = '')
    {
        return base_path('plugins') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}


if (!function_exists('modules_plugin')) {
    /**
     * @return \Tuke\Base\Plugin\Support\Plugin
     */
    function modules_plugin()
    {
        return \Tuke\Base\Plugin\Facades\PluginFacade::getFacadeRoot();
    }
}
