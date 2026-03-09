<?php
/**
 * Description of WayForPayException.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Exceptions;

use Dots\WayForPay\App\Client\Responses\ErrorResponseDTO;
use Exception;
use Throwable;

class WayForPayException extends Exception
{
    public function __construct(
        private ErrorResponseDTO $errorResponseDTO,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getErrorResponseDTO(): ErrorResponseDTO
    {
        return $this->errorResponseDTO;
    }
}
