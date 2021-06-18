<?php


namespace AtlasByte\Common;


class PaymentRequest
{

    private string $transactionId;
    private string $currency;
    private float $amount;
    private string $email;
    private bool $tokenize = false;

    /**
     * PaymentRequest constructor.
     * @param string $transactionId
     * @param string $currency
     * @param float $amount
     */
    public function __construct(string $transactionId, string $currency, float $amount, string $email)
    {
        $this->transactionId = $transactionId;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->email = $email;
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

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isTokenize(): bool
    {
        return $this->tokenize;
    }

    /**
     * Enable card tokenization, if enable the gateway will return the tokenized card
     * if the transaction is successful
     * @param bool $tokenize
     */
    public function setTokenize(bool $tokenize): void
    {
        $this->tokenize = $tokenize;
    }


}