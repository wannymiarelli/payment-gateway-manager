<?php

namespace AtlasByte\Gateways\Axerve\Dto;

class AxervePaymentMethodDTO {

    protected AxerveErrorDTO $error;
    protected array $paymentMethod = [];

    /**
     * AxervePaymentMethodDTO constructor.
     */
    public function __construct(object $data) {
        $this->error = new AxerveErrorDTO($data->error->code, $data->error->description);
        foreach ($data->payload->paymentMethod as $method) {
            array_push($this->paymentMethod, new AxervePaymentChannelDTO($method));
        }
    }

}