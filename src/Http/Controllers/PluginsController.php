<?php namespace Tuke\Base\Plugin\Http\Controllers;

use Tuke\Base\Http\Controllers\BaseAdminController;
use Tuke\Base\Plugin\Http\DataTables\PluginsListDataTable;
use Illuminate\Support\Facades\Artisan;
use Yajra\Datatables\Engines\BaseEngine;

class PluginsController extends BaseAdminController
{
    protected $module = 'tuke-modules-plugin';

    protected $dashboardMenuId = 'tuke-plugins';

    /**
     * Get index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(PluginsListDataTable $dataTable)
    {
        $this->breadcrumbs->addLink(trans('tuke-modules-plugin::base.plugins'));

        $this->setPageTitle(trans('tuke-modules-plugin::base.plugins'));

        $this->getDashboardMenu($this->dashboardMenuId);

        $this->dis['dataTable'] = $dataTable->run();

        return do_filter('tuke-modules-plugin.index.get', $this)->viewAdmin('plugins-list');
    }

    /**
     * Set data for DataTable plugin
     * @param PluginsListDataTable|BaseEngine $dataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function postListing(PluginsListDataTable $dataTable)
    {
        return do_filter('datatables.tuke-modules-plugin.index.post', $dataTable, $this);
    }

    public function postChangeStatus($module, $status)
    {
        switch ((bool)$status) {
            case true:
                tuke_plugins()->enableModule($module);
                return modules_plugin()->refreshComposerAutoload();
                break;
            default:
                tuke_plugins()->disableModule($module);
                return modules_plugin()->refreshComposerAutoload();
                break;
        }
    }

    public function postInstall($alias)
    {
        $module = get_plugin($alias);

        if(!$module) {
            return response_with_messages(trans('tuke-modules-plugin::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('plugin:install', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('tuke-modules-plugin::base.plugin_installed'));
    }

    public function postUpdate($alias)
    {
        $module = get_plugin($alias);

        if(!$module) {
            return response_with_messages(trans('tuke-modules-plugin::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('plugin:update', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('tuke-modules-plugin::base.plugin_updated'));
    }

    public function postUninstall($alias)
    {
        $module = get_plugin($alias);

        if(!$module) {
            return response_with_messages(trans('tuke-modules-plugin::base.plugin_not_exists'), true, \Constants::ERROR_CODE);
        }

        Artisan::call('plugin:uninstall', [
            'alias' => $alias
        ]);

        return response_with_messages(trans('tuke-modules-plugin::base.plugin_uninstalled'));
    }
}
