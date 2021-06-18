<?php

namespace AtlasByte\Gateways\Axerve\Dto;

class AxervePaymentChannelDTO
{

    private string $name;
    private string $paymentTpe;
    private AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentChannelDTO constructor.
     */
    public function __construct(object $data) {
        $this->name = $data->name;
        $this->paymentTpe = $data->name;
        $this->userRedirect = new AxervePaymentURLDTO($data->userRedirect->href);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPaymentTpe(): string
    {
        return $this->paymentTpe;
    }

    /**
     * @return AxervePaymentURLDTO
     */
    public function getUserRedirect(): AxervePaymentURLDTO
    {
        return $this->userRedirect;
    }

}