<?php

namespace AtlasByte\Factories;

use AtlasByte\Common\ApiUriResolver;
use AtlasByte\Common\Http\HttpClient;
use AtlasByte\Contracts\IPaymentGateway;
use AtlasByte\Gateways\Axerve\AxervePaymentGateway;

class PaymentGatewayFactory
{

    /**
     * @throws \AtlasByte\Exceptions\InvalidConfigurationException
     */
    public function getGateway (string $gateway, array $configuration) : ?IPaymentGateway {
        switch ($gateway) {
            case "axerve":
                return new AxervePaymentGateway(
                    $configuration,
                    new HttpClient(
                        new ApiUriResolver(
                            "https://sandbox.gestpay.net/api",
                            "https://ecomms2s.sella.it/api",
                            $configuration['test_mode'] ?? true
                        )
                    )
                );
        }

        return null;
    }

}