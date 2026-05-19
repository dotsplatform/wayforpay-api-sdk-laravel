<?php
/**
 * Description of WayForPayConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client;

use Dots\WayForPay\App\Client\Auth\DTO\WayForPayAuthDTO;
use Dots\WayForPay\App\Client\Auth\WayForPaySignatureGenerator;
use Dots\WayForPay\App\Client\Exceptions\WayForPayException;
use Dots\WayForPay\App\Client\Requests\Payments\ChargePaymentRequest;
use Dots\WayForPay\App\Client\Requests\Payments\CheckStatusRequest;
use Dots\WayForPay\App\Client\Requests\Payments\Complete3DSRequest;
use Dots\WayForPay\App\Client\Requests\Payments\CreateInvoiceRequest;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\ChargePaymentRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\CheckStatusRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\Complete3DSRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\CreateInvoiceRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\RefundPaymentRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\DTO\SettlePaymentRequestDTO;
use Dots\WayForPay\App\Client\Requests\Payments\RefundPaymentRequest;
use Dots\WayForPay\App\Client\Requests\Payments\SettlePaymentRequest;
use Dots\WayForPay\App\Client\Responses\CheckStatusResponseDTO;
use Dots\WayForPay\App\Client\Responses\CreateInvoiceResponseDTO;
use Dots\WayForPay\App\Client\Responses\ErrorResponseDTO;
use Dots\WayForPay\App\Client\Responses\PaymentResponseDTO;
use Dots\WayForPay\App\Client\Responses\RefundResponseDTO;
use RuntimeException;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class WayForPayConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        private readonly WayForPayAuthDTO $authDto,
    ) {
    }

    /**
     * @throws WayForPayException
     */
    public function createInvoice(CreateInvoiceRequestDTO $dto): CreateInvoiceResponseDTO
    {
        return $this->send(new CreateInvoiceRequest($dto))->dto();
    }

    /**
     * @throws WayForPayException
     */
    public function chargePayment(ChargePaymentRequestDTO $dto): PaymentResponseDTO
    {
        return $this->send(new ChargePaymentRequest($dto))->dto();
    }

    /**
     * @throws WayForPayException
     */
    public function settlePayment(SettlePaymentRequestDTO $dto): PaymentResponseDTO
    {
        return $this->send(new SettlePaymentRequest($dto))->dto();
    }

    /**
     * @throws WayForPayException
     */
    public function refundPayment(RefundPaymentRequestDTO $dto): RefundResponseDTO
    {
        return $this->send(new RefundPaymentRequest($dto))->dto();
    }

    /**
     * @throws WayForPayException
     */
    public function checkStatus(CheckStatusRequestDTO $dto): CheckStatusResponseDTO
    {
        return $this->send(new CheckStatusRequest($dto))->dto();
    }

    /**
     * @throws WayForPayException
     */
    public function complete3DS(Complete3DSRequestDTO $dto): PaymentResponseDTO
    {
        return $this->send(new Complete3DSRequest($dto))->dto();
    }

    public function getAuthDto(): WayForPayAuthDTO
    {
        return $this->authDto;
    }

    public function getSignatureGenerator(): WayForPaySignatureGenerator
    {
        return new WayForPaySignatureGenerator();
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function resolveBaseUrl(): string
    {
        $host = config('wayforpay.hosts.api');
        if (! is_string($host)) {
            throw new RuntimeException('Invalid WayForPay API host');
        }

        return $host;
    }


    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new WayForPayException($errorResponse);
    }
}
