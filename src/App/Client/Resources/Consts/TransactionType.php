<?php
/**
 * Description of TransactionType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Resources\Consts;

enum TransactionType: string
{
    case CHARGE = 'CHARGE';
    case SETTLE = 'SETTLE';
    case REFUND = 'REFUND';
    case CHECK_STATUS = 'CHECK_STATUS';
    case COMPLETE_3DS = 'COMPLETE_3DS';
}
