<?php namespace Tuke\Base\Plugin\Providers;

use Illuminate\Support\ServiceProvider;
use Tuke\Base\Plugin\Models\CoreModules;
use Tuke\Base\Plugin\Models\Plugins;
use Tuke\Base\Plugin\Repositories\Contracts\PluginsRepositoryContract;
use Tuke\Base\Plugin\Repositories\PluginsRepository;
use Tuke\Base\Plugin\Repositories\PluginsRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PluginsRepositoryContract::class, function () {
            $repository = new PluginsRepository(new Plugins());

            return $repository;
        });
    }
}
