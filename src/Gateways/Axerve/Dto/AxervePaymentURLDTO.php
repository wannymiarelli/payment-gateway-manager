<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentURLDTO extends BaseDto
{

    public string $href;

    /**
     * AxervePaymentURLDTO constructor.
     * @param string $href
     */
    public function __construct(string $href)
    {
        parent::__construct();
        $this->href = $href;
    }

}