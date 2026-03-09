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
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Saloon\Http\Response;

class CreateInvoiceRequest extends PostWayForPayRequest
{
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
        $secureHost = config('wayforpay.hosts.secure');
        if (! is_string($secureHost)) {
            throw new RuntimeException('Invalid WayForPay Secure host');
        }

        return $secureHost . '/pay?behavior=offline';
    }

    public function createDtoFromResponse(Response $response): CreateInvoiceResponseDTO
    {
        Log::warning('response DD', [
            $response->json(),
        ]);
        return CreateInvoiceResponseDTO::fromResponse($response);
    }
}
