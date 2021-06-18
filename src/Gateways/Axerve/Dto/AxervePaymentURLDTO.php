<?php


namespace AtlasByte\Gateways\Axerve\Dto;


use AtlasByte\Common\BaseDto;

class AxervePaymentURLDTO extends BaseDto
{

    protected string $href;

    /**
     * AxervePaymentURLDTO constructor.
     * @param string $href
     */
    public function __construct(string $href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

}