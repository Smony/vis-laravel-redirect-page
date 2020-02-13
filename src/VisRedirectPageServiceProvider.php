<?php

namespace Vis\LaravelRedirectPage;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class VisRedirectPageServiceProvider extends ServiceProvider
{
    protected $route;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(Redirect::class, 'vis.redirect.model');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/vis-redirect-page.php' => config_path('vis-redirect-page.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../config/page-redirects.php' => config_path('builder/tb-definitions/page-redirects.php'),
        ], 'vis-config');

        if (empty(File::glob($this->getDatabasePath()))) {
            $timeStamp = Carbon::now()->format('Y_m_d_His');

            $migration = database_path("migrations/{$timeStamp}_create_vis_redirects_table.php");

            $this->publishes([
                __DIR__ . '/../database/migrations/create_vis_redirects_table.php.stub' => $migration,
            ], 'migrations');
        }
    }

    /**
     * @return string
     */
    protected function getDatabasePath(): string
    {
        return database_path('migrations/*_create_vis_redirects_table.php');
    }
}
