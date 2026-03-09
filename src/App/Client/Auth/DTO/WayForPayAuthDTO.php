<?php
/**
 * Description of WayForPayAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Auth\DTO;

use Dots\Data\DTO;

class WayForPayAuthDTO extends DTO
{
    protected string $merchantAccount;

    protected string $merchantSecretKey;

    protected string $merchantDomainName;

    public function getMerchantAccount(): string
    {
        return $this->merchantAccount;
    }

    public function getMerchantSecretKey(): string
    {
        return $this->merchantSecretKey;
    }

    public function getMerchantDomainName(): string
    {
        return $this->merchantDomainName;
    }
}
