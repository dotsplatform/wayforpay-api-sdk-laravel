<?php
/**
 * Description of WayForPayWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Resources;

use Dots\Data\DTO;
use Dots\WayForPay\App\Client\Resources\Consts\TransactionStatus;

class WayForPayWebhookDTO extends DTO
{
    protected ?string $merchantAccount;

    protected ?string $orderReference;

    protected ?string $merchantSignature;

    protected ?float $amount;

    protected ?string $currency;

    protected ?string $authCode;

    protected ?string $email;

    protected ?string $phone;

    protected ?int $createdDate;

    protected ?int $processingDate;

    protected ?string $cardPan;

    protected ?string $cardType;

    protected ?string $issuerBankCountry;

    protected ?string $issuerBankName;

    protected ?string $recToken;

    protected ?TransactionStatus $transactionStatus;

    protected ?string $reason;

    protected ?string $reasonCode;

    protected ?float $fee;

    protected ?string $paymentSystem;

    public function getMerchantAccount(): ?string
    {
        return $this->merchantAccount;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function getMerchantSignature(): ?string
    {
        return $this->merchantSignature;
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

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function getRecToken(): ?string
    {
        return $this->recToken;
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
