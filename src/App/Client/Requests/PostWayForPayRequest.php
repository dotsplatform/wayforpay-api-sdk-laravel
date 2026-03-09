<?php
/**
 * Description of PostWayForPayRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PostWayForPayRequest extends BaseWayForPayRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
}
