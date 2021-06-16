<?php


namespace AtlasByte\Gateways\Axerve\Dto;


class AxervePaymentDTO
{

    protected AxerveErrorDTO $error;
    protected string $paymentToken;
    protected string $paymentId;
    protected AxervePaymentURLDTO $userRedirect;

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