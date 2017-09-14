<?php namespace Tuke\Base\Plugin\Http\Middleware;

use \Closure;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dashboard_menu()
//            ->registerItem([
//                'id' => 'tuke-plugins',
//                'priority' => 1001.1,
//                'parent_id' => null,
//                'heading' => null,
//                'title' => trans('tuke-modules-plugin::base.admin_menu.plugins.title'),
//                'font_icon' => 'icon-paper-plane',
//                'link' => route('admin::plugins.index.get'),
//                'css_class' => null,
//                'permissions' => ['view-plugins'],
//            ]);

        return $next($request);
    }
}
