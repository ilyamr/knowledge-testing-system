<?php

namespace App\Providers;

use App\Study\RSA;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class StudyPracticeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        require app_path('Study/routes.php');
    }
}
