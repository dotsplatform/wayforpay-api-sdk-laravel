<?php
/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Responses;

class ErrorResponseDTO extends WayForPayResponseDTO
{
    protected ?string $reason;

    protected ?string $reasonCode;

    protected ?string $transactionStatus;

    protected ?string $orderReference;

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getReasonCode(): ?string
    {
        return $this->reasonCode;
    }

    public function getTransactionStatus(): ?string
    {
        return $this->transactionStatus;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }
}
