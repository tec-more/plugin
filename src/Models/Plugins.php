<?php namespace Tuke\Base\Plugin\Models;

use Tuke\Base\Plugin\Models\Contracts\PluginsModelContract;
use Tuke\Base\Models\EloquentBase as BaseModel;

class Plugins extends BaseModel implements PluginsModelContract
{
    protected $table = 'plugins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'alias',
        'installed_version',
        'enabled',
        'installed',
    ];

    public $timestamps = true;

    public function setEnabledAttribute($value)
    {
        $this->attributes['enabled'] = (int)!!$value;
    }

    public function setInstalledAttribute($value)
    {
        $this->attributes['installed'] = (int)!!$value;
    }
}
