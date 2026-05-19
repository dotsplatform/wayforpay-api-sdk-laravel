<?php
/**
 * Description of WayForPaySecureConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client;

use RuntimeException;

class WayForPaySecureConnector extends WayForPayConnector
{
    public function resolveBaseUrl(): string
    {
        $host = config('wayforpay.hosts.secure');
        if (! is_string($host)) {
            throw new RuntimeException('Invalid WayForPay Secure host');
        }

        return $host;
    }
}
