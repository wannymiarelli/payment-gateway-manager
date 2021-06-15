<?php

namespace AtlasByte\Gateways\Axerve;

use AtlasByte\Common\PaymentRequest;
use AtlasByte\Contracts\IPaymentOutcome;
use AtlasByte\Gateways\AbstractPaymentGateway;
use AtlasByte\Gateways\PaymentLink;

class AxervePaymentGateway extends AbstractPaymentGateway
{

    const SANDBOX_URI = "https://sandbox.gestpay.net/api";
    const PRODUCTION_URI = "https://ecomms2s.sella.it/api";

    protected array $candidateConfiguration = [
        'key' => '',
        'version' => 'v1',
        'sandbox' => false
    ];

    public function authenticate(): void
    {
    }

    public function generatePaymentLink(PaymentRequest $paymentRequest): PaymentLink
    {
    }

    public function handlePaymentCallback(array $data): IPaymentOutcome
    {
    }

}