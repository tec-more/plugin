<?php namespace Tuke\Base\Plugin\Http\DataTables;

use Tuke\Base\Http\DataTables\AbstractDataTables;
use Yajra\Datatables\Engines\CollectionEngine;
use Yajra\Datatables\Engines\EloquentEngine;
use Yajra\Datatables\Engines\QueryBuilderEngine;

class PluginsListDataTable extends AbstractDataTables
{
    protected $repository;

    public function __construct()
    {
        $this->repository = get_plugin();
    }

    /**
     * @return array
     */
    public function headings()
    {
        return [
            'name' => [
                'title' => trans('tuke-modules-plugin::datatables.heading.name'),
                'width' => '20%',
            ],
            'description' => [
                'title' => trans('tuke-modules-plugin::datatables.heading.description'),
                'width' => '50%',
            ],
            'actions' => [
                'title' => trans('tuke-core::datatables.heading.actions'),
                'width' => '30%',
            ],
        ];
    }

    /**
     * @return array
     */
    public function columns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'searchable' => false, 'orderable' => false],
            ['data' => 'description', 'name' => 'description', 'searchable' => false, 'orderable' => false],
            ['data' => 'actions', 'name' => 'actions', 'searchable' => false, 'orderable' => false],
        ];
    }

    /**
     * @return string
     */
    public function run()
    {
        $this->setAjaxUrl(route('admin::plugins.index.post'), 'POST');

        return $this->view();
    }

    /**
     * @return CollectionEngine|EloquentEngine|QueryBuilderEngine|mixed
     */
    protected function fetchDataForAjax()
    {
        return datatable()->of($this->repository)
            ->rawColumns(['description', 'actions'])
            ->editColumn('description', function ($item) {
                return array_get($item, 'description') . '<br><br>'
                    . trans('tuke-modules-plugin::datatables.author') . ': <b>' . array_get($item, 'author') . '</b><br>'
                    . trans('tuke-modules-plugin::datatables.version') . ': <b>' . array_get($item, 'version', '...') . '</b><br>'
                    . trans('tuke-modules-plugin::datatables.installed_version') . ': <b>' . (array_get($item, 'installed_version', '...') ?: '...') . '</b>';
            })
            ->addColumn('actions', function ($item) {
                $activeBtn = (!array_get($item, 'enabled')) ? form()->button(trans('tuke-modules-plugin::datatables.active'), [
                    'title' => trans('tuke-modules-plugin::datatables.active_this_plugin'),
                    'data-ajax' => route('admin::plugins.change-status.post', [
                        'module' => array_get($item, 'alias'),
                        'status' => 1,
                    ]),
                    'data-method' => 'POST',
                    'data-toggle' => 'confirmation',
                    'class' => 'btn btn-outline green btn-sm ajax-link',
                ]) : '';

                $disableBtn = (array_get($item, 'enabled')) ? form()->button(trans('tuke-modules-plugin::datatables.disable'), [
                    'title' => trans('tuke-modules-plugin::datatables.disable_this_plugin'),
                    'data-ajax' => route('admin::plugins.change-status.post', [
                        'module' => array_get($item, 'alias'),
                        'status' => 0,
                    ]),
                    'data-method' => 'POST',
                    'data-toggle' => 'confirmation',
                    'class' => 'btn btn-outline yellow-lemon btn-sm ajax-link',
                ]) : '';

                $installBtn = (array_get($item, 'enabled') && !array_get($item, 'installed')) ? form()->button(trans('tuke-modules-plugin::datatables.install'), [
                    'title' => trans('tuke-modules-plugin::datatables.install_this_plugin'),
                    'data-ajax' => route('admin::plugins.install.post', [
                        'module' => array_get($item, 'alias'),
                    ]),
                    'data-method' => 'POST',
                    'data-toggle' => 'confirmation',
                    'class' => 'btn btn-outline blue btn-sm ajax-link',
                ]) : '';

                $updateBtn = (
                    array_get($item, 'enabled') &&
                    array_get($item, 'installed') &&
                    version_compare(array_get($item, 'installed_version'), array_get($item, 'version'), '<')
                )
                    ? form()->button(trans('tuke-modules-plugin::datatables.update'), [
                        'title' => trans('tuke-modules-plugin::datatables.update_this_plugin'),
                        'data-ajax' => route('admin::plugins.update.post', [
                            'module' => array_get($item, 'alias'),
                        ]),
                        'data-method' => 'POST',
                        'data-toggle' => 'confirmation',
                        'class' => 'btn btn-outline purple btn-sm ajax-link',
                    ])
                    : '';

                $uninstallBtn = (array_get($item, 'enabled') && array_get($item, 'installed')) ? form()->button(trans('tuke-modules-plugin::datatables.uninstall'), [
                    'title' => trans('tuke-modules-plugin::datatables.uninstall_this_plugin'),
                    'data-ajax' => route('admin::plugins.uninstall.post', [
                        'module' => array_get($item, 'alias'),
                    ]),
                    'data-method' => 'POST',
                    'data-toggle' => 'confirmation',
                    'class' => 'btn btn-outline red-sunglo btn-sm ajax-link',
                ]) : '';

                return $activeBtn . $disableBtn . $installBtn . $updateBtn . $uninstallBtn;
            });
    }
}
