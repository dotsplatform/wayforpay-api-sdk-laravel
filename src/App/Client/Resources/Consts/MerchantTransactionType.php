<?php
/**
 * Description of MerchantTransactionType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Resources\Consts;

enum MerchantTransactionType: string
{
    case SALE = 'SALE';
    case AUTH = 'AUTH';
    case AUTO = 'AUTO';
}
