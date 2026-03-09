<?php
/**
 * Description of WayForPayServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App;

use Illuminate\Support\ServiceProvider;

class WayForPayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/wayforpay.php',
            'wayforpay'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/wayforpay.php' => config_path('wayforpay.php'),
        ], 'config');
    }
}
