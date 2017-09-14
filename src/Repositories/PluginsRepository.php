<?php namespace Tuke\Base\Plugin\Repositories;

use Tuke\Base\Repositories\Eloquent\EloquentBaseRepository;
use Tuke\Base\Plugin\Repositories\Contracts\PluginsRepositoryContract;

class PluginsRepository extends EloquentBaseRepository implements PluginsRepositoryContract
{
    /**
     * @param $alias
     * @return mixed|null
     */
    public function getByAlias($alias)
    {
        return $this->model->where('alias', '=', $alias)->first();
    }
}
