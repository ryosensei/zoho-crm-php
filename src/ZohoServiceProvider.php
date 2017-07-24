<?php
namespace Zoho\CRM;

use Illuminate\Support\ServiceProvider;

class ZohoServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/zoho.php' => config_path('zoho.php'),
        ]);
    }
}
