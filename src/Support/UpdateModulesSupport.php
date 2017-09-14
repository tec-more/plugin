<?php namespace Tuke\Base\Plugin\Support;

class UpdateModulesSupport
{
    /**
     * @var array
     */
    protected $batches = [
        'plugins' => [

        ],
    ];

    /**
     * @param $moduleAlias
     * @param array $batches
     * @param string $type
     * @return $this
     */
    public function registerUpdateBatches($moduleAlias, array $batches, $type = 'plugins')
    {
        $this->batches[$type][$moduleAlias] = $batches;

        return $this;
    }

    /**
     * @param $moduleAlias
     * @param string $type
     * @return $this
     */
    public function loadBatches($moduleAlias, $type = 'plugins')
    {
        $currentModuleInformation = get_plugin($moduleAlias);
        if (!$currentModuleInformation) {
            return $this;
        }

        ksort($this->batches[$type]);

        $installedModuleVersion = array_get($currentModuleInformation, 'installed_version');
        foreach ($this->batches[$type][$moduleAlias] as $version => $batch) {
            if (!$installedModuleVersion || version_compare($version, $installedModuleVersion, '>')) {
                require $batch;
            }
        }
        return $this;
    }
}
