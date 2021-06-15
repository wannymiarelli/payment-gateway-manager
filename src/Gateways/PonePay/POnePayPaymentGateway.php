<?php

namespace AtlasByte\Gateways\PonePay;

use AtlasByte\Common\PaymentRequest;
use AtlasByte\Contracts\IPaymentLink;
use AtlasByte\Contracts\IPaymentOutcome;
use AtlasByte\Gateways\AbstractPaymentGateway;

class POnePayPaymentGateway extends AbstractPaymentGateway
{

    protected array $candidateConfiguration = [
        'secret' => ''
    ];

    public function authenticate(): void
    {
        // TODO: Implement authenticate() method.
    }

    public function generatePaymentLink(PaymentRequest $paymentRequest): IPaymentLink
    {
        // TODO: Implement generatePaymentLink() method.
    }

    public function handlePaymentCallback(array $data): IPaymentOutcome
    {
        // TODO: Implement handlePaymentCallback() method.
    }
}