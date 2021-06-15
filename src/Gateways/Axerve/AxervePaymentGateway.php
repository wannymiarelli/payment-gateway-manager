<?php

namespace AtlasByte\Gateways\Axerve;

use AtlasByte\Common\PaymentRequest;
use AtlasByte\Contracts\IPaymentOutcome;
use AtlasByte\Gateways\AbstractPaymentGateway;
use AtlasByte\Gateways\PaymentLink;

class AxervePaymentGateway extends AbstractPaymentGateway
{

    protected array $candidateConfiguration = [
        'key' => ''
    ];

    /**
     * Axerve authentication uses apikey. It should be sent in the Authorization header
     * This method
     */
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