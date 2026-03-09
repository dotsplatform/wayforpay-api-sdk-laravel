<?php
/**
 * Description of RefundResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Responses;

use Dots\WayForPay\App\Client\Resources\Consts\TransactionStatus;

class RefundResponseDTO extends WayForPayResponseDTO
{
    protected ?string $merchantAccount;

    protected ?string $orderReference;

    protected ?TransactionStatus $transactionStatus;

    protected ?string $reason;

    protected ?string $reasonCode;

    public function getMerchantAccount(): ?string
    {
        return $this->merchantAccount;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function getTransactionStatus(): ?TransactionStatus
    {
        return $this->transactionStatus;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getReasonCode(): ?string
    {
        return $this->reasonCode;
    }

    public function isRefunded(): bool
    {
        return $this->transactionStatus?->isRefunded() ?? false;
    }

    public function isVoided(): bool
    {
        return $this->transactionStatus?->isVoided() ?? false;
    }
}
