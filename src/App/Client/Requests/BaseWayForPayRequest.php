<?php
/**
 * Description of BaseWayForPayRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseWayForPayRequest extends Request
{
    protected Method $method = Method::GET;
}
