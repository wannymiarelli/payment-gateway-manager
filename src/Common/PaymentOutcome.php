<?php

namespace AtlasByte\Common;

use AtlasByte\Contracts\IPaymentOutcome;

class PaymentOutcome implements IPaymentOutcome
{

    private bool $executed = false;
    private string $paymentType;
    private string $paymentToken;
    private string $paymentId;
    private string $transactionId;
    private string $bankTransactionId;

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

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getBankTransactionId(): string
    {
        return $this->bankTransactionId;
    }

    /**
     * @param string $bankTransactionId
     */
    public function setBankTransactionId(string $bankTransactionId): void
    {
        $this->bankTransactionId = $bankTransactionId;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    public function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

}