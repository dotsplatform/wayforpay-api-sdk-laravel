<?php
/**
 * Description of CreateInvoiceRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;
use Dots\WayForPay\App\Client\Resources\Consts\Currency;
use Dots\WayForPay\App\Client\Resources\Consts\MerchantTransactionType;

class CreateInvoiceRequestDTO extends DTO
{
    protected string $merchantAccount;

    protected string $merchantDomainName;

    protected string $merchantSignature;

    protected MerchantTransactionType $merchantTransactionType;

    protected string $orderReference;

    protected int $orderDate;

    protected float $amount;

    protected Currency $currency;

    protected array $productName;

    protected array $productPrice;

    protected array $productCount;

    protected int $apiVersion;

    protected ?string $serviceUrl;

    protected ?string $returnUrl;

    protected ?string $clientFirstName;

    protected ?string $clientLastName;

    protected ?string $clientEmail;

    protected ?string $clientPhone;

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

    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    public function toRequestData(): array
    {
        return $this->toArray();
    }
}
