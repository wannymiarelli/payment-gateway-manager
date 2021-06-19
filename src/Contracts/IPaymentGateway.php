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
     * Request authorization to the gateway. Most of the time it does not process the payment
     * it only creates the authorization request that will be later used to capture or
     * cancel the payment.
     * @param PaymentRequest $paymentRequest
     * @return mixed
     */
    public function authorizePayment (PaymentRequest $paymentRequest) : IPaymentOutcome;

    /**
     * Confirm a previously created authorization. This performs the real charge to the
     * payment source for the given amount. You must use an existing transaction Id.
     * @param string $transactionId
     * @param float $amount
     * @param string $currency
     * @return mixed
     */
    public function capturePayment (string $transactionId, float $amount, string $currency) : IPaymentOutcome;

    /**
     * Cancel a previous authorized transaction. It means that the transaction id will no
     * longer work to capture the amount
     * @param string $transactionId
     * @param float $amount
     * @param string $currency
     * @param null $reason
     * @return mixed
     */
    public function cancelPayment (string $transactionId, float $amount, string $currency, $reason = null);

    /**
     * Refund a captured payment, the refund amount can be partial or total.
     * @param string $transactionId
     * @param float $amount
     * @return mixed
     */
    public function refundPayment (string $transactionId, float $amount);

    /**
     * Handles the gateway callback that contains payment outcome and status
     * it builds a PaymentOutcome object that contains all the details
     * @param array $data
     * @return IPaymentOutcome
     */
    public function handlePaymentCallback (array $data) : IPaymentOutcome;

    /**
     * Returns the current configuration of the gateway
     * @return array
     */
    public function getConfiguration () : array;

    /**
     * Check if the gateway configuration contains all the mandatory
     * parameters to initiate a connection
     * @return bool
     */
    public function validateConfiguration () : bool;

}