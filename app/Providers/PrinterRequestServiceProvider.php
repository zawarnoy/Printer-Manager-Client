<?php

namespace App\Providers;

use App\Services\Printer\Request\PrinterRequestService;
use Illuminate\Support\ServiceProvider;

class PrinterRequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(' App\Services\Printer\Request\PrinterRequestService', function($app) {
            return new PrinterRequestService();
        });
    }
}
