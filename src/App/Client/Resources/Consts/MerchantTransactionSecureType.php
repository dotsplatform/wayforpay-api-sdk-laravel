<?php
/**
 * Description of MerchantTransactionSecureType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Resources\Consts;

enum MerchantTransactionSecureType: string
{
    case AUTO = 'AUTO';
    case THREE_DS = '3DS';
    case NON_3DS = 'NON3DS';
}
