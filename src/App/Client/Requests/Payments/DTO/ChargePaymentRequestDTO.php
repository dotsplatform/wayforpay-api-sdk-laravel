<?php
/**
 * Description of ChargePaymentRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;
use Dots\WayForPay\App\Client\Resources\Consts\Currency;
use Dots\WayForPay\App\Client\Resources\Consts\MerchantTransactionSecureType;
use Dots\WayForPay\App\Client\Resources\Consts\MerchantTransactionType;

class ChargePaymentRequestDTO extends DTO
{
    protected string $merchantAccount;

    protected string $merchantDomainName;

    protected string $merchantSignature;

    protected MerchantTransactionType $merchantTransactionType;

    protected MerchantTransactionSecureType $merchantTransactionSecureType;

    protected string $orderReference;

    protected int $orderDate;

    protected float $amount;

    protected Currency $currency;

    protected array $productName;

    protected array $productPrice;

    protected array $productCount;

    protected int $apiVersion;

    protected ?string $serviceUrl;

    protected ?string $card;

    protected ?string $expMonth;

    protected ?string $expYear;

    protected ?string $cardCvv;

    protected ?string $cardHolder;

    protected ?string $recToken;

    protected ?string $clientFirstName;

    protected ?string $clientLastName;

    protected ?string $clientEmail;

    protected ?string $clientPhone;

    protected ?string $clientCountry;

    protected ?string $clientIpAddress;

    protected ?int $holdTimeout;

    public function getMerchantAccount(): string
    {
        return $this->merchantAccount;
    }

    public function getMerchantDomainName(): string
    {
        return $this->merchantDomainName;
    }

    public function getMerchantSignature(): string
    {
        return $this->merchantSignature;
    }

    public function getOrderReference(): string
    {
        return $this->orderReference;
    }

    public function getOrderDate(): int
    {
        return $this->orderDate;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getProductName(): array
    {
        return $this->productName;
    }

    public function getProductPrice(): array
    {
        return $this->productPrice;
    }

    public function getProductCount(): array
    {
        return $this->productCount;
    }

    public function getServiceUrl(): ?string
    {
        return $this->serviceUrl;
    }

    public function getRecToken(): ?string
    {
        return $this->recToken;
    }

    public function toRequestData(): array
    {
        $data = $this->toArray();
        $data['transactionType'] = 'CHARGE';

        return $data;
    }
}
