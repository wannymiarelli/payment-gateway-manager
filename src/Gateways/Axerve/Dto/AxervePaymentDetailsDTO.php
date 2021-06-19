<?php


namespace AtlasByte\Gateways\Axerve\Dto;


class AxervePaymentDetailsDTO
{

    private string $transactionType;
    private string $transactionResult;
    private string $transactionErrorCode;
    private string $transactionErrorDescription;
    private string $bankTransactionID;
    private string $shopTransactionID;
    private string $authorizationCode;
    private string $paymentID;
    private string $currency;
    private string $country;
    private string $company;
    private string $tdLevel;
    private string $alertCode;
    private string $alertDescription;
    private string $cvvPresent;
    private string $maskedPAN;
    private string $paymentMethod;
    private string $productType;
    private string $token;
    private string $tokenExpiryMonth;
    private string $tokenExpiryYear;
    private AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentDetailsDTO constructor.
     */
    public function __construct(object $data) {
        $this->transactionType = $data["transactionType"];
        $this->transactionResult = $data["transactionResult"];
        $this->transactionErrorCode = $data["transactionErrorCode"];
        $this->transactionErrorDescription = $data["transactionErrorDescription"];
        $this->bankTransactionID = $data["bankTransactionID"];
        $this->shopTransactionID = $data["shopTransactionID"];
        $this->authorizationCode = $data["authorizationCode"];
        $this->paymentID = $data["paymentID"];
        $this->currency = $data["currency"];
        $this->country = $data["country"];
        $this->company = $data["company"];
        $this->tdLevel = $data["tdLevel"];
        $this->alertCode = $data["alertCode"];
        $this->alertDescription = $data["alertDescription"];
        $this->cvvPresent = $data["cvvPresent"];
        $this->maskedPAN = $data["maskedPAN"];
        $this->paymentMethod = $data["paymentMethod"];
        $this->productType = $data["productType"];
        $this->token = $data["token"];
        $this->tokenExpiryMonth = $data["tokenExpiryMonth"];
        $this->tokenExpiryYear = $data["tokenExpiryYear"];
        $this->userRedirect = new AxervePaymentURLDTO($data->userRedirect->href);
    }

    /**
     * @return mixed|string
     */
    public function getTransactionType(): mixed
    {
        return $this->transactionType;
    }

    /**
     * @return mixed|string
     */
    public function getTransactionResult(): mixed
    {
        return $this->transactionResult;
    }

    /**
     * @return mixed|string
     */
    public function getTransactionErrorCode(): mixed
    {
        return $this->transactionErrorCode;
    }

    /**
     * @return mixed|string
     */
    public function getTransactionErrorDescription(): mixed
    {
        return $this->transactionErrorDescription;
    }

    /**
     * @return mixed|string
     */
    public function getBankTransactionID(): mixed
    {
        return $this->bankTransactionID;
    }

    /**
     * @return mixed|string
     */
    public function getShopTransactionID(): mixed
    {
        return $this->shopTransactionID;
    }

    /**
     * @return mixed|string
     */
    public function getAuthorizationCode(): mixed
    {
        return $this->authorizationCode;
    }

    /**
     * @return mixed|string
     */
    public function getPaymentID(): mixed
    {
        return $this->paymentID;
    }

    /**
     * @return mixed|string
     */
    public function getCurrency(): mixed
    {
        return $this->currency;
    }

    /**
     * @return mixed|string
     */
    public function getCountry(): mixed
    {
        return $this->country;
    }

    /**
     * @return mixed|string
     */
    public function getCompany(): mixed
    {
        return $this->company;
    }

    /**
     * @return mixed|string
     */
    public function getTdLevel(): mixed
    {
        return $this->tdLevel;
    }

    /**
     * @return mixed|string
     */
    public function getAlertCode(): mixed
    {
        return $this->alertCode;
    }

    /**
     * @return mixed|string
     */
    public function getAlertDescription(): mixed
    {
        return $this->alertDescription;
    }

    /**
     * @return mixed|string
     */
    public function getCvvPresent(): mixed
    {
        return $this->cvvPresent;
    }

    /**
     * @return mixed|string
     */
    public function getMaskedPAN(): mixed
    {
        return $this->maskedPAN;
    }

    /**
     * @return mixed|string
     */
    public function getPaymentMethod(): mixed
    {
        return $this->paymentMethod;
    }

    /**
     * @return mixed|string
     */
    public function getProductType(): mixed
    {
        return $this->productType;
    }

    /**
     * @return mixed|string
     */
    public function getToken(): mixed
    {
        return $this->token;
    }

    /**
     * @return mixed|string
     */
    public function getTokenExpiryMonth(): mixed
    {
        return $this->tokenExpiryMonth;
    }

    /**
     * @return mixed|string
     */
    public function getTokenExpiryYear(): mixed
    {
        return $this->tokenExpiryYear;
    }

    /**
     * @return AxervePaymentURLDTO
     */
    public function getUserRedirect(): AxervePaymentURLDTO
    {
        return $this->userRedirect;
    }

}