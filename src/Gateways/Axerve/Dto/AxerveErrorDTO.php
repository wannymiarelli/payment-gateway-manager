<?php


namespace AtlasByte\Gateways\Axerve\Dto;


class AxerveErrorDTO
{

    protected int $code = 0;
    protected string $description;

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