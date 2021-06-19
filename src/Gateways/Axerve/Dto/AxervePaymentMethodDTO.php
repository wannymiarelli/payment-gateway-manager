<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentMethodDTO extends BaseDto {

    public AxerveErrorDTO $error;
    public array $paymentMethod = [];

    /**
     * AxervePaymentMethodDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->error = new AxerveErrorDTO($this->readAttribute($data, 'error'));
        $methods = $this->readAttribute($data, 'payload.paymentMethod');
        foreach ($methods as $method) {
            array_push($this->paymentMethod, new AxervePaymentChannelDTO($method));
        }
    }

}