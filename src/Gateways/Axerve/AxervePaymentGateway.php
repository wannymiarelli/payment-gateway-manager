<?php

namespace AtlasByte\Gateways\Axerve;

use AtlasByte\Common\Http\HttpClient;
use AtlasByte\Common\PaymentRequest;
use AtlasByte\Contracts\IPaymentOutcome;
use AtlasByte\Exceptions\PaymentGenerationException;
use AtlasByte\Gateways\AbstractPaymentGateway;
use AtlasByte\Gateways\Axerve\Dto\AxervePaymentDTO;
use AtlasByte\Gateways\PaymentLink;

class AxervePaymentGateway extends AbstractPaymentGateway
{

    const SANDBOX_URI = "https://sandbox.gestpay.net/api";
    const PRODUCTION_URI = "https://ecomms2s.sella.it/api";

    protected array $candidateConfiguration = [
        'key' => '',
        'version' => 'v1',
        'shopLogin' => '',
        'sandbox' => false
    ];

    public function __construct(array $configuration, HttpClient $httpClient)
    {
        parent::__construct($configuration, $httpClient);
    }


    /**
     * Create a payment via Axerve. The HTTP call returns the payment details along with the unique
     * payment token that is valid for the next 24h and for a maximum of 10 trials (5 in sandbox)
     * https://api.gestpay.it/#post-payment-create
     * @param PaymentRequest $paymentRequest
     * @return AxervePaymentDTO
     */
    private function createPayment (PaymentRequest $paymentRequest) : AxervePaymentDTO {
        $requestBody = [
            "shopLogin" => $this->getConfiguration()['shopLogin'],
            "amount" => $paymentRequest->getAmount(),
            "currency" => $paymentRequest->getCurrency(),
            "shopTransactionID" => $paymentRequest->getTransactionId()
        ];

        $this->httpClient->post(SANDBOX_URI);

        return new AxervePaymentDTO();
    }

    /**
     * Axerve authentication is based on API KEY placed in the Authorization header
     * https://api.gestpay.it/#authorizing-calls-against-axerve-e-commerce-solutions
     */
    public function authenticate(): void {
        $this->httpClient->setHeaders([
            'Authorization' => 'apikey ' . $this->configuration['key']
        ]);
    }

    /**
     * Generate a payment link using axerve gateway. It receive a payment request with transaction details
     * and send a request directly to the gateway that will respond with the payment page link
     * @throws PaymentGenerationException
     */
    public function generatePaymentLink(PaymentRequest $paymentRequest): PaymentLink {
        $payment = $this->createPayment($paymentRequest);
        // check payment outcome
        if ($payment->getError()->getCode() !== 0) {
            throw new PaymentGenerationException("[AXERVE] - Error generating payment message=" . $payment->getError()->getDescription() . ", code=" . $payment->getError()->getCode());
        }

    }

    public function handlePaymentCallback(array $data): IPaymentOutcome {
    }

}