<?php
/**
 * Description of CheckStatusResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Responses;

use Dots\WayForPay\App\Client\Resources\Consts\TransactionStatus;

class CheckStatusResponseDTO extends WayForPayResponseDTO
{
    protected ?string $merchantAccount;

    protected ?string $orderReference;

    protected ?string $merchantSignature;

    protected ?float $amount;

    protected ?string $currency;

    protected ?string $authCode;

    protected ?int $createdDate;

    protected ?int $processingDate;

    protected ?string $cardPan;

    protected ?string $cardType;

    protected ?string $issuerBankCountry;

    protected ?string $issuerBankName;

    protected ?TransactionStatus $transactionStatus;

    protected ?string $reason;

    protected ?string $reasonCode;

    protected ?int $settlementDate;

    protected ?float $settlementAmount;

    protected ?float $fee;

    protected ?float $refundAmount;

    public function getMerchantAccount(): ?string
    {
        return $this->merchantAccount;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getAuthCode(): ?string
    {
        return $this->authCode;
    }

    public function getCardPan(): ?string
    {
        return $this->cardPan;
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

    public function getSettlementAmount(): ?float
    {
        return $this->settlementAmount;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function getRefundAmount(): ?float
    {
        return $this->refundAmount;
    }

    public function isApproved(): bool
    {
        return $this->transactionStatus?->isApproved() ?? false;
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
