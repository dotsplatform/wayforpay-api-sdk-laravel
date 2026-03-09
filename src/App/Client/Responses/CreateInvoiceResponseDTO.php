<?php
/**
 * Description of CreateInvoiceResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Responses;

class CreateInvoiceResponseDTO extends WayForPayResponseDTO
{
    protected ?string $url;

    protected ?string $reason;

    protected ?string $reasonCode;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getReasonCode(): ?string
    {
        return $this->reasonCode;
    }
}
