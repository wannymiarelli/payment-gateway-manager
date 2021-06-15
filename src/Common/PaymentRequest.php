<?php


namespace AtlasByte\Common;


class PaymentRequest
{

    private string $transactionId;
    private string $currency;
    private float $amount;

    /**
     * PaymentRequest constructor.
     * @param string $transactionId
     * @param string $currency
     * @param float $amount
     */
    public function __construct(string $transactionId, string $currency, float $amount)
    {
        $this->transactionId = $transactionId;
        $this->currency = $currency;
        $this->amount = $amount;
    }

    /**
     * Unique ID of the transaction
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * Currency CODE ISO format
     * https://api.gestpay.it/#currency-codes
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Amount to capture in float value
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }




}