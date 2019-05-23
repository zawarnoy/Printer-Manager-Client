<?php

namespace App\Providers;

use App\Services\Printer\Request\PrinterRequestService;
use App\Services\Server\ServerCommunicationService;
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
            return new PrinterRequestService(new ServerCommunicationService());
        });

        $this->app->bind('App\Services\Server\ServerCommunicationService', function($app) {
           return new ServerCommunicationService();
        });
    }
}
