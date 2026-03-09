<?php
/**
 * Description of CheckStatusRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments;

use Dots\WayForPay\App\Client\Requests\Payments\DTO\CheckStatusRequestDTO;
use Dots\WayForPay\App\Client\Requests\PostWayForPayRequest;
use Dots\WayForPay\App\Client\Responses\CheckStatusResponseDTO;
use Saloon\Http\Response;

class CheckStatusRequest extends PostWayForPayRequest
{
    public const ENDPOINT = '/api';

    public function __construct(
        private readonly CheckStatusRequestDTO $dto,
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

    public function createDtoFromResponse(Response $response): CheckStatusResponseDTO
    {
        return CheckStatusResponseDTO::fromResponse($response);
    }
}
