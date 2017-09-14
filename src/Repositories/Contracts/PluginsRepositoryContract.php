<?php namespace Tuke\Base\Plugin\Repositories\Contracts;

interface PluginsRepositoryContract
{
    /**
     * @param $alias
     * @return mixed|null
     */
    public function getByAlias($alias);
}
