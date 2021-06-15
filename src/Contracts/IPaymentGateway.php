<?php
namespace AtlasByte\Contracts;
use AtlasByte\Common\PaymentRequest;

/**
 * Common interface to payment functionalities against a gateway
 * Interface IPaymentGateway
 * @package AtlasByte\Contracts
 */
interface IPaymentGateway
{

    /**
     * Authenticate with the payment gateway to later run requests. Authentication may vary
     * and it is actually implemented in the specific gateway class
     */
    public function authenticate () : void;

    /**
     * Runs the request to generate a payment link against the gateway and returns
     * a PaymentLinkObject to access all the details of the generated payment
     * @return IPaymentLink
     */
    public function generatePaymentLink (PaymentRequest $paymentRequest) : IPaymentLink;

    /**
     * Handles the gateway callback that contains payment outcome and status
     * it builds a PaymentOutcome object that contains all the details
     * @param array $data
     * @return IPaymentOutcome
     */
    public function handlePaymentCallback (array $data) : IPaymentOutcome;

    public function getConfiguration () : array;

    public function validateConfiguration () : bool;

}