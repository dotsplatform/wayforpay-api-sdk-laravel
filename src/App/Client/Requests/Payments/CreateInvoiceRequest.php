<?php

/**
 * Description of CreateInvoiceRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments;

use Dots\WayForPay\App\Client\Requests\Payments\DTO\CreateInvoiceRequestDTO;
use Dots\WayForPay\App\Client\Requests\PostWayForPayRequest;
use Dots\WayForPay\App\Client\Responses\CreateInvoiceResponseDTO;
use Saloon\Http\Response;

class CreateInvoiceRequest extends PostWayForPayRequest
{
    private constst ENDPOINT = '/pay?behavior=offline';

    public function __construct(
        private readonly CreateInvoiceRequestDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->dto->toRequestData();
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function createDtoFromResponse(Response $response): CreateInvoiceResponseDTO
    {
        return CreateInvoiceResponseDTO::fromResponse($response);
    }
}
