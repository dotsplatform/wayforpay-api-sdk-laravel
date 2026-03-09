<?php
/**
 * Description of Complete3DSRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;

class Complete3DSRequestDTO extends DTO
{
    protected string $authorization_ticket;

    protected ?string $d3ds_md;

    protected string $d3ds_pares;

    public function getAuthorizationTicket(): string
    {
        return $this->authorization_ticket;
    }

    public function getD3dsMd(): ?string
    {
        return $this->d3ds_md;
    }

    public function getD3dsPares(): string
    {
        return $this->d3ds_pares;
    }

    public function toRequestData(): array
    {
        $data = $this->toArray();
        $data['transactionType'] = 'COMPLETE_3DS';

        return $data;
    }
}
