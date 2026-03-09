<?php
/**
 * Description of ChargePaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments;

use Dots\WayForPay\App\Client\Requests\Payments\DTO\ChargePaymentRequestDTO;
use Dots\WayForPay\App\Client\Requests\PostWayForPayRequest;
use Dots\WayForPay\App\Client\Responses\PaymentResponseDTO;
use Saloon\Http\Response;

class ChargePaymentRequest extends PostWayForPayRequest
{
    public const ENDPOINT = '/api';

    public function __construct(
        private readonly ChargePaymentRequestDTO $dto,
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

    public function createDtoFromResponse(Response $response): PaymentResponseDTO
    {
        return PaymentResponseDTO::fromResponse($response);
    }
}
