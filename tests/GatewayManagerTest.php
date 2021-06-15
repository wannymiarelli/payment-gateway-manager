<?php

use PHPUnit\Framework\TestCase;

class GatewayManagerTest extends TestCase
{

    public function test_available_gateway () : void {
        $manager = new \AtlasByte\PaymentGatewayManager('axerve', [
            'key' => 'key',
            'version' => 'v1',
            'sandbox' => true
        ]);
        $this->assertInstanceOf(\AtlasByte\PaymentGatewayManager::class, $manager);
        $this->assertInstanceOf(\AtlasByte\Contracts\IPaymentGateway::class, $manager->getGateway());
        $this->assertNotEquals([], $manager->getGateway()->getConfiguration());
        $this->assertEquals('key', $manager->getGateway()->getConfiguration()['key']);
    }

}