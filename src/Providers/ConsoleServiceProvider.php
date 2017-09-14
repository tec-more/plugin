<?php namespace Tuke\Base\Plugin\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->generatorCommands();
        $this->otherCommands();
    }

    protected function generatorCommands()
    {
        $this->commands([
            /**
             * Plugin
             */
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeProvider::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeController::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeMiddleware::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeRequest::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeModel::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeRepository::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeFacade::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeService::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeSupport::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeView::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeMigration::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeCommand::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeDataTable::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeCriteria::class,
//            \Tuke\Base\Plugin\Console\Generators\Plugin\MakeAction::class,
        ]);
    }

    protected function otherCommands()
    {
        $this->commands([
            \Tuke\Base\Plugin\Console\Commands\InstallPluginCommand::class,
            \Tuke\Base\Plugin\Console\Commands\UpdatePluginCommand::class,
            \Tuke\Base\Plugin\Console\Commands\UninstallPluginCommand::class,
            \Tuke\Base\Plugin\Console\Commands\DisablePluginCommand::class,
            \Tuke\Base\Plugin\Console\Commands\EnablePluginCommand::class,
        ]);
    }
}
