<?php
/**
 * Description of RefundPaymentRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;
use Dots\WayForPay\App\Client\Resources\Consts\Currency;

class RefundPaymentRequestDTO extends DTO
{
    protected string $merchantAccount;

    protected string $merchantSignature;

    protected string $orderReference;

    protected float $amount;

    protected Currency $currency;

    protected string $comment;

    public function getMerchantAccount(): string
    {
        return $this->merchantAccount;
    }

    public function getMerchantSignature(): string
    {
        return $this->merchantSignature;
    }

    public function getOrderReference(): string
    {
        return $this->orderReference;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function toRequestData(): array
    {
        $data = $this->toArray();
        $data['transactionType'] = 'REFUND';

        return $data;
    }
}
