<?php
/**
 * Description of Complete3DSRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments;

use Dots\WayForPay\App\Client\Requests\Payments\DTO\Complete3DSRequestDTO;
use Dots\WayForPay\App\Client\Requests\PostWayForPayRequest;
use Dots\WayForPay\App\Client\Responses\PaymentResponseDTO;
use Saloon\Http\Response;

class Complete3DSRequest extends PostWayForPayRequest
{
    public const ENDPOINT = '/api';

    public function __construct(
        private readonly Complete3DSRequestDTO $dto,
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
