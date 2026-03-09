<?php
/**
 * Description of PaymentResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Responses;

use Dots\WayForPay\App\Client\Resources\Consts\TransactionStatus;

class PaymentResponseDTO extends WayForPayResponseDTO
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

    // 3DS fields
    protected ?string $d3AcsUrl;

    protected ?string $d3Md;

    protected ?string $d3Pareq;

    protected ?string $authTicket;

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

    public function getCreatedDate(): ?int
    {
        return $this->createdDate;
    }

    public function getProcessingDate(): ?int
    {
        return $this->processingDate;
    }

    public function getCardPan(): ?string
    {
        return $this->cardPan;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function getRecToken(): ?string
    {
        return $this->recToken;
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

    public function getPaymentSystem(): ?string
    {
        return $this->paymentSystem;
    }

    public function getD3AcsUrl(): ?string
    {
        return $this->d3AcsUrl;
    }

    public function getD3Md(): ?string
    {
        return $this->d3Md;
    }

    public function getD3Pareq(): ?string
    {
        return $this->d3Pareq;
    }

    public function getAuthTicket(): ?string
    {
        return $this->authTicket;
    }

    public function isApproved(): bool
    {
        return $this->transactionStatus?->isApproved() ?? false;
    }

    public function isDeclined(): bool
    {
        return $this->transactionStatus?->isDeclined() ?? false;
    }

    public function isInProcessing(): bool
    {
        return $this->transactionStatus?->isInProcessing() ?? false;
    }

    public function isRefunded(): bool
    {
        return $this->transactionStatus?->isRefunded() ?? false;
    }

    public function isVoided(): bool
    {
        return $this->transactionStatus?->isVoided() ?? false;
    }

    public function requires3DS(): bool
    {
        return $this->isInProcessing() && $this->d3AcsUrl !== null;
    }
}
