<?php namespace Tuke\Base\Plugin\Facades;

use Illuminate\Support\Facades\Facade;
use Tuke\Base\Plugin\Support\UpdateModulesSupport;

/**
 * @method static registerUpdateBatches($moduleAlias, array $batches, string $type = 'plugins')
 * @method static loadBatches($moduleAlias, string $type = 'plugins')
 */
class UpdateModulesFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return UpdateModulesSupport::class;
    }
}
