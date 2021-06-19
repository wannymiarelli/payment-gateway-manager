<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentOutcomeDTO extends BaseDto
{

    public AxerveErrorDTO $error;
    public AxervePaymentDetailsDTO $payload;

    /**
     * AxervePaymentOutcomeDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->error = new AxerveErrorDTO($this->readAttribute($data, 'error'));
        $this->payload = new AxervePaymentDetailsDTO(
            $this->readAttribute($data, 'payload')
        );
    }

}