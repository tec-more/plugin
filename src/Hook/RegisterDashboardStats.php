<?php namespace Tuke\Base\Plugin\Hook;


class RegisterDashboardStats
{

    protected $plugins;

    public function __construct()
    {
        $this->plugins = get_plugin();
    }

    public function handle()
    {
        echo view('tuke-modules-plugin::admin.dashboard-stats.stat-box', [
            'count' => $this->plugins->count()
        ]);
    }
}
