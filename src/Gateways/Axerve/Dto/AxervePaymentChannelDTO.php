<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentChannelDTO extends BaseDto
{

    public ?string $name;
    public ?string $paymentTpe;
    public AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentChannelDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->name = $this->readAttribute($data, 'name');
        $this->paymentTpe = $this->readAttribute($data, 'paymentType');
        $this->userRedirect = new AxervePaymentURLDTO(
            $this->readAttribute($data, 'userRedirect.href')
        );
    }

}