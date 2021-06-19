<?php

namespace AtlasByte\Common;

use AtlasByte\Contracts\IPaymentOutcome;

class PaymentOutcome implements IPaymentOutcome
{

    private bool $executed = false;
    private string $paymentToken;
    private string $paymentId;

    /**
     * PaymentOutcome constructor.
     * @param bool $executed
     * @param string $paymentToken
     * @param string $paymentId
     */
    public function __construct(bool $executed, string $paymentToken, string $paymentId)
    {
        $this->executed = $executed;
        $this->paymentToken = $paymentToken;
        $this->paymentId = $paymentId;
    }

    /**
     * @return bool
     */
    public function isExecuted(): bool
    {
        return $this->executed;
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

}