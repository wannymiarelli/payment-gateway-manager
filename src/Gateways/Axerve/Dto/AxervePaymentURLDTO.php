<?php


namespace AtlasByte\Gateways\Axerve\Dto;


class AxervePaymentURLDTO
{

    protected string $href;

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

}