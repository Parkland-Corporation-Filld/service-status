<?php
namespace Filld\ServiceStatus;

use Illuminate\Support\ServiceProvider;

class ServiceStatusServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->router->get('/', function () {
            $sha     = '';
            $shaFile = base_path() . '/release';
            if (file_exists($shaFile)) {
                $sha = trim(file_get_contents($shaFile));
            }

            return [
                "app"         => config('app.name'),
                "release"     => config('app.version'),
                "environment" => app()->environment(),
                "commit"      => $sha
            ];
        });
    }
}