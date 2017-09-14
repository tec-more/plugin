<?php namespace Tuke\Base\Plugin\Support;

use \Closure;
use Illuminate\Support\Collection;
//use Tuke\Base\Plugin\Events\ModuleDisabled;
//use Tuke\Base\Plugin\Events\ModuleEnabled;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Composer;
//use Tuke\Base\Plugin\Facades\ModulesFacade;

class Plugin
{
    /**
     * @var Collection
     */
    protected $modules;

    /**
     * @var Collection
     */
    protected $plugins;

    /**
     * @var Composer
     */
    protected $composer;

    public function __construct(Composer $composer)
    {
        $this->composer = $composer;
        $this->composer->setWorkingPath(base_path());

        $this->plugins = get_plugin();
    }

    /**
     * Run command composer dump-autoload
     */
    public function refreshComposerAutoload()
    {
        $this->composer->dumpAutoloads();
        $result = response_with_messages('Composer autoload refreshed');

        return $result;
    }

    /**
     * @return Collection
     */
    public function getAllPlugins()
    {
        return $this->plugins;
    }
}
