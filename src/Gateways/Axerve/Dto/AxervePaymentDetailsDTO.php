<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentDetailsDTO extends BaseDto
{

    public ?string $transactionType;
    public ?string $transactionResult;
    public ?string $transactionErrorCode;
    public ?string $transactionErrorDescription;
    public ?string $bankTransactionID;
    public ?string $shopTransactionID;
    public ?string $authorizationCode;
    public ?string $paymentID;
    public ?string $currency;
    public ?string $country;
    public ?string $company;
    public ?string $tdLevel;
    public ?string $alertCode;
    public ?string $alertDescription;
    public ?string $cvvPresent;
    public ?string $maskedPAN;
    public ?string $paymentMethod;
    public ?string $productType;
    public ?string $token;
    public ?string $tokenExpiryMonth;
    public ?string $tokenExpiryYear;
    public AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentDetailsDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->transactionType = $this->readAttribute($data, 'transactionType');
        $this->transactionResult = $this->readAttribute($data, 'transactionResult');
        $this->transactionErrorCode = $this->readAttribute($data, 'transactionErrorCode');
        $this->transactionErrorDescription = $this->readAttribute($data, 'transactionErrorDescription');
        $this->bankTransactionID = $this->readAttribute($data, 'bankTransactionID');
        $this->shopTransactionID = $this->readAttribute($data, 'shopTransactionID');
        $this->authorizationCode = $this->readAttribute($data, 'authorizationCode');
        $this->paymentID = $this->readAttribute($data, 'paymentID');
        $this->currency = $this->readAttribute($data, 'currency');
        $this->country = $this->readAttribute($data, 'country');
        $this->company = $this->readAttribute($data, 'company');
        $this->tdLevel = $this->readAttribute($data, 'tdLevel');
        $this->alertCode = $this->readAttribute($data, 'alertCode');
        $this->alertDescription = $this->readAttribute($data, 'alertDescription');
        $this->cvvPresent = $this->readAttribute($data, 'cvvPresent');
        $this->maskedPAN = $this->readAttribute($data, 'maskedPAN');
        $this->paymentMethod = $this->readAttribute($data, 'paymentMethod');
        $this->productType = $this->readAttribute($data, 'productType');
        $this->token = $this->readAttribute($data, 'token');
        $this->tokenExpiryMonth = $this->readAttribute($data, 'tokenExpiryMonth');
        $this->tokenExpiryYear = $this->readAttribute($data, 'tokenExpiryYear');
        $this->userRedirect = $this->readAttribute($data, 'userRedirect');
    }

}