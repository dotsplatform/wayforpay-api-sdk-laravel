<?php
/**
 * Description of CheckStatusRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;

class CheckStatusRequestDTO extends DTO
{
    protected string $merchantAccount;

    protected string $merchantSignature;

    protected string $orderReference;

    protected int $apiVersion;

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

    public function getApiVersion(): int
    {
        return $this->apiVersion;
    }

    public function toRequestData(): array
    {
        $data = $this->toArray();
        $data['transactionType'] = 'CHECK_STATUS';

        return $data;
    }
}
