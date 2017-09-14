<?php namespace Tuke\Base\Plugin\Providers;

use Illuminate\Support\ServiceProvider;
use Tuke\Base\Plugin\Hook\RegisterDashboardStats;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        add_action(TUKE_DASHBOARD_STATS, [RegisterDashboardStats::class, 'handle'], 22);
    }
}
