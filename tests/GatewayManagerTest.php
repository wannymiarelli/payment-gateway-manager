<?php

use PHPUnit\Framework\TestCase;

class GatewayManagerTest extends TestCase
{

    public function test_available_gateway(): void
    {
        $manager = new \AtlasByte\Factories\PaymentGatewayFactory();
        $axerve = $manager->getGateway('axerve', [
            'key' => 'key',
            'version' => 'v1',
            'shopLogin' => 'GESPAY86410',
            'sandbox' => true
        ]);
        $this->assertInstanceOf(\AtlasByte\Gateways\Axerve\AxervePaymentGateway::class, $axerve);
        $this->assertNotEquals([], $axerve->getConfiguration());
        $this->assertEquals('key', $axerve->getConfiguration()['key']);
    }

}