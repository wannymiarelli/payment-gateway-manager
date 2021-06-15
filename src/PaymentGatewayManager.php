<?php

namespace AtlasByte;

use AtlasByte\Contracts\IPaymentGateway;
use AtlasByte\Exceptions\GatewayNotSupportedException;
use AtlasByte\Gateways\Axerve\AxervePaymentGateway;
use AtlasByte\Gateways\PonePay\POnePayPaymentGateway;

class PaymentGatewayManager
{

    private array $supportedGateways = [
        'pone' => POnePayPaymentGateway::class,
        'axerve' => AxervePaymentGateway::class
    ];

    /**
     * Gateway to be initializzed
     * @var IPaymentGateway|null
     */
    private ?IPaymentGateway $gateway = null;

    /**
     * GatewayManager constructor.
     * @param string $gateway The gateway to be initialized
     * @throws GatewayNotSupportedException
     */
    public function __construct(string $gateway, array $configuration)
    {
        if (!array_key_exists($gateway, $this->supportedGateways)) {
            throw new GatewayNotSupportedException(
                "The gateway " . $gateway . " is not supported."
            );
        }
        $this->gateway = new $this->supportedGateways[$gateway]($configuration);
    }

    /**
     * Return the PaymentGateway implementation
     * @return IPaymentGateway
     */
    public function getGateway(): IPaymentGateway {
        return $this->gateway;
    }

}