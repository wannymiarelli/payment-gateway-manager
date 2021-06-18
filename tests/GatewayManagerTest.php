<?php

use PHPUnit\Framework\TestCase;

class GatewayManagerTest extends TestCase
{

    public function test_available_gateway(): void
    {
        $manager = new \AtlasByte\Factories\PaymentGatewayFactory();
        $axerve = $manager->getGateway('axerve', [
            'key' => 'R0VTUEFZODY0MTAjI0VzZXJjZW50ZSBUZXN0IGRpIE1pYXJlbGxpIyMwNC8wNi8yMDIxIDE0OjIzOjM5',
            'version' => 'v1',
            'shopLogin' => 'GESPAY86410',
            'sandbox' => true
        ]);
        $this->assertInstanceOf(\AtlasByte\Gateways\Axerve\AxervePaymentGateway::class, $axerve);
        $this->assertNotEquals([], $axerve->getConfiguration());
        $this->assertEquals('R0VTUEFZODY0MTAjI0VzZXJjZW50ZSBUZXN0IGRpIE1pYXJlbGxpIyMwNC8wNi8yMDIxIDE0OjIzOjM5', $axerve->getConfiguration()['key']);

        $data = $axerve->generatePaymentLink(new \AtlasByte\Common\PaymentRequest(
            "test123",
            "EUR",
            100,
            "w.miarelli@besaferate.com"
        ));

        var_dump($data);
    }

}