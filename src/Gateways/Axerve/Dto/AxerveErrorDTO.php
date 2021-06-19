<?php


namespace AtlasByte\Gateways\Axerve\Dto;


use AtlasByte\Common\BaseDto;

class AxerveErrorDTO extends BaseDto
{

    public ?string $code = "0";
    public ?string $description;

    /**
     * AxerveErrorDTO constructor.
     * @param int $code
     * @param string $description
     */
    public function __construct($data)
    {
        parent::__construct();
        $this->code = $this->readAttribute($data, 'code');
        $this->description = $this->readAttribute($data, 'description');
    }

}