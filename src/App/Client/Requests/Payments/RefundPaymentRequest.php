<?php
/**
 * Description of RefundPaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments;

use Dots\WayForPay\App\Client\Requests\Payments\DTO\RefundPaymentRequestDTO;
use Dots\WayForPay\App\Client\Requests\PostWayForPayRequest;
use Dots\WayForPay\App\Client\Responses\RefundResponseDTO;
use Saloon\Http\Response;

class RefundPaymentRequest extends PostWayForPayRequest
{
    public const ENDPOINT = '/api';

    public function __construct(
        private readonly RefundPaymentRequestDTO $dto,
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

    public function createDtoFromResponse(Response $response): RefundResponseDTO
    {
        return RefundResponseDTO::fromResponse($response);
    }
}
