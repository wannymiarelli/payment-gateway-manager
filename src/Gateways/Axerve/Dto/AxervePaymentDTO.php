<?php


namespace AtlasByte\Gateways\Axerve\Dto;


use AtlasByte\Common\BaseDto;
use JetBrains\PhpStorm\Pure;

class AxervePaymentDTO extends BaseDto
{

    private string $paymentToken;
    private string $paymentId;
    private AxerveErrorDTO $error;
    private AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentDTO constructor.
     */
    public function __construct(object $data) {
        $this->paymentId = $data->payload->paymentID;
        $this->paymentToken = $data->payload->paymentToken;
        $this->error = new AxerveErrorDTO(
            $data->error->code,
            $data->error->description
        );
        if ($data->payload->userRedirect) {
            $this->userRedirect = new AxervePaymentURLDTO($data->payload->userRedirect->href);
        }
    }


    /**
     * @return AxerveErrorDTO
     */
    public function getError(): AxerveErrorDTO
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getPaymentToken(): string
    {
        return $this->paymentToken;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @return AxervePaymentURLDTO
     */
    public function getUserRedirect(): AxervePaymentURLDTO
    {
        return $this->userRedirect;
    }



}