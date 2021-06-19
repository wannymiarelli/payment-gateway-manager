<?php

namespace AtlasByte\Gateways\Axerve\Dto;

use AtlasByte\Common\BaseDto;

class AxervePaymentCaptureDTO extends BaseDto
{

    public ?string $errorCode = "0";
    public ?string $errorDescription;
    public ?string $transactionType;
    public ?string $transactionResult;
    public ?string $bankTransactionID;
    public ?string $shopTransactionID;
    public ?string $paymentID;

    /**
     * AxervePaymentCaptureDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->errorCode = $this->readAttribute($data, 'error.code');
        $this->errorDescription = $this->readAttribute($data, 'error.description');
        $this->transactionType = $this->readAttribute($data, 'payload.transactionType');
        $this->transactionResult = $this->readAttribute($data, 'payload.transactionResult');
        $this->bankTransactionID = $this->readAttribute($data, 'payload.bankTransactionID');
        $this->shopTransactionID = $this->readAttribute($data, 'payload.shopTransactionID');
        $this->paymentID = $this->readAttribute($data, 'payload.paymentID');
    }


}