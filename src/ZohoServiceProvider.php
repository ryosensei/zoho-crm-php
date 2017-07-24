<?php
namespace Zoho\CRM;

use Illuminate\Support\ServiceProvider;

class ZohoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__.'/zoho.php' => config_path('zoho.php'),
        ]);

        $configPath = __DIR__ . "/zoho.php";
        $this->publishes([$configPath => config_path('zoho.php')], 'config');
    }
}
