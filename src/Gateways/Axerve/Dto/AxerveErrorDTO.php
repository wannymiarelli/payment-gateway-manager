<?php


namespace AtlasByte\Gateways\Axerve\Dto;


use AtlasByte\Common\BaseDto;

class AxerveErrorDTO extends BaseDto
{

    protected int $code = 0;
    protected string $description;

    /**
     * AxerveErrorDTO constructor.
     * @param int $code
     * @param string $description
     */
    public function __construct(int $code, string $description)
    {
        $this->code = $code;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }



}