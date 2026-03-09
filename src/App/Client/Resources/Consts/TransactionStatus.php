<?php
/**
 * Description of TransactionStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Resources\Consts;

enum TransactionStatus: string
{
    case APPROVED = 'Approved';
    case DECLINED = 'Declined';
    case IN_PROCESSING = 'InProcessing';
    case REFUNDED = 'Refunded';
    case VOIDED = 'Voided';
    case EXPIRED = 'Expired';
    case CREATED = 'Created';
    case PENDING = 'Pending';

    public function isApproved(): bool
    {
        return $this === self::APPROVED;
    }

    public function isDeclined(): bool
    {
        return $this === self::DECLINED;
    }

    public function isInProcessing(): bool
    {
        return $this === self::IN_PROCESSING;
    }

    public function isRefunded(): bool
    {
        return $this === self::REFUNDED;
    }

    public function isVoided(): bool
    {
        return $this === self::VOIDED;
    }

    public function isExpired(): bool
    {
        return $this === self::EXPIRED;
    }
}
