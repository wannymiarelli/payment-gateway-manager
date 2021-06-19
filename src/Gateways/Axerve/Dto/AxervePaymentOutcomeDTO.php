<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Contracts\IPaymentOutcome;

class AxervePaymentOutcomeDTO implements IPaymentOutcome
{

    private AxerveErrorDTO $error;
    private AxervePaymentDetailsDTO $payload;

    /**
     * AxervePaymentOutcomeDTO constructor.
     */
    public function __construct(object $data) {
        if (isset($data['error'])) {
            $this->error = new AxerveErrorDTO($data->error->code, $data->error->message);
        }
        $this->payload = new AxervePaymentDetailsDTO($data->payload);
    }

    /**
     * @return AxerveErrorDTO
     */
    public function getError(): AxerveErrorDTO
    {
        return $this->error;
    }

    /**
     * @return AxervePaymentDetailsDTO
     */
    public function getPayload(): AxervePaymentDetailsDTO
    {
        return $this->payload;
    }

}