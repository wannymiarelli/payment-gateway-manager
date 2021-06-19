<?php

namespace AtlasByte\Gateways\Axerve;

use AtlasByte\Common\Http\HttpClient;
use AtlasByte\Common\Http\PaymentMethod;
use AtlasByte\Common\PaymentOutcome;
use AtlasByte\Common\PaymentRequest;
use AtlasByte\Contracts\IPaymentOutcome;
use AtlasByte\Exceptions\PaymentGenerationException;
use AtlasByte\Gateways\AbstractPaymentGateway;
use AtlasByte\Gateways\Axerve\Dto\AxervePaymentDTO;
use AtlasByte\Gateways\Axerve\Dto\AxervePaymentMethodDTO;
use AtlasByte\Gateways\Axerve\Dto\AxervePaymentOutcomeDTO;
use AtlasByte\Gateways\PaymentLink;

class AxervePaymentGateway extends AbstractPaymentGateway
{

    protected array $candidateConfiguration = [
        'key' => '',
        'shopLogin' => '',
        'sandbox' => false
    ];

    public function __construct(array $configuration, HttpClient $httpClient)
    {
        parent::__construct($configuration, $httpClient);
    }

    /**
     * Retrieve all the payment methods available for the current payment.
     * @param AxervePaymentDTO $axervePaymentDTO
     * @return AxervePaymentMethodDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPaymentMethods (AxervePaymentDTO $axervePaymentDTO) : array {
        $response = $this->httpClient->get('/v1/payment/methods/' . $axervePaymentDTO->getPaymentId() . '/1', [
            'headers' => [
                'paymentToken' => $axervePaymentDTO->getPaymentToken()
            ]
        ]);

        $availableMethods = new AxervePaymentMethodDTO(json_decode($response->getBody()));

        $methods = [];

        foreach ($availableMethods as $method) {
            $paymentMethod = new PaymentMethod(
                $method->name,
                $method->logo,
                $method->paymentType
            );
            if (isset($method->userRedirect)) {
                $paymentMethod->setUserRedirect($method->userRedirect->href);
            }
            array_push($methods, $paymentMethod);
        }

        return $methods;
    }

    /**
     * Submit the payment to the gateway to obtain authorization
     * @param AxervePaymentDTO $axervePaymentDTO
     * @return AxervePaymentMethodDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function submitPayment (AxervePaymentDTO $axervePaymentDTO) : AxervePaymentOutcomeDTO {
        $response = $this->httpClient->post('/v1/payment/submit', [
            'headers' => [
                'Content-Type' => 'application/json',
                'paymentToken' => $axervePaymentDTO->getPaymentToken(),
            ],
            'json' => [
                'shopLogin' => $this->getConfiguration()['shopLogin']
            ]
        ]);

        $data = json_decode($response->getBody());

        return new AxervePaymentOutcomeDTO($data);
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
        // create a new payment token
        $payment = $this->createPayment($paymentRequest);
        // check payment outcome
        if ($payment->getError()->getCode() !== 0) {
            throw new PaymentGenerationException("[AXERVE] - Error generating payment message=" . $payment->getError()->getDescription() . ", code=" . $payment->getError()->getCode());
        }

        $paymentLink = $this->getPaymentMethods($payment);

        var_dump($paymentLink);
    }

    public function handlePaymentCallback(array $data): IPaymentOutcome {
    }

    public function authorizePayment(PaymentRequest $paymentRequest) : PaymentOutcome {
        $requestBody = [
            "shopLogin" => $this->getConfiguration()['shopLogin'],
            "amount" => $paymentRequest->getAmount(),
            "currency" => $paymentRequest->getCurrency(),
            "shopTransactionID" => $paymentRequest->getTransactionId(),
        ];

        // if email is there we want the link to be sent by axerve to the customer
        if ($paymentRequest->getEmail() && $paymentRequest->getEmail() != "") {
            $requestBody['buyerEmail'] = $paymentRequest->getEmail();
            $requestBody['paymentChannel'] = [
                'channelType' => ['EMAIL']
            ];
        }

        if ($paymentRequest->isTokenize()) {
            $requestBody['requestToken'] = 'MASKEDPAN';
        }

        $response = $this->httpClient->post('/v1/payment/create', [
            'json' => $requestBody,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'apikey ' . $this->getConfiguration()['key']
            ]
        ]);

        $data = new AxervePaymentDTO(json_decode($response->getBody()));

        return new PaymentOutcome(
            true,
            $data->getPaymentToken(),
            $data->getPaymentId()
        );
    }

    public function capturePayment(string $transactionId, float $amount, string $currency)
    {
        // TODO: Implement capturePayment() method.
    }

    public function cancelPayment(string $transactionId, float $amount, string $currency, $reason = null)
    {
        // TODO: Implement cancelPayment() method.
    }

    public function refundPayment(string $transactionId, float $amount)
    {
        // TODO: Implement refundPayment() method.
    }
}