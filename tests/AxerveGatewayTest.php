<?php

use PHPUnit\Framework\TestCase;

class AxerveGatewayTest extends TestCase
{

    private function getAxerveManager () : \AtlasByte\Contracts\IPaymentGateway
    {
        $manager = new \AtlasByte\Factories\PaymentGatewayFactory();
        return $manager->getGateway('axerve', [
            'key' => 'R0VTUEFZODY0MTAjI0VzZXJjZW50ZSBUZXN0IGRpIE1pYXJlbGxpIyMwNC8wNi8yMDIxIDE0OjIzOjM5',
            'version' => 'v1',
            'shopLogin' => 'GESPAY86410',
            'sandbox' => true
        ]);
    }

    public function test_available_gateway(): void
    {
        $axerve = $this->getAxerveManager();
        $this->assertInstanceOf(\AtlasByte\Gateways\Axerve\AxervePaymentGateway::class, $axerve);
        $this->assertNotEquals([], $axerve->getConfiguration());
        $this->assertEquals('R0VTUEFZODY0MTAjI0VzZXJjZW50ZSBUZXN0IGRpIE1pYXJlbGxpIyMwNC8wNi8yMDIxIDE0OjIzOjM5', $axerve->getConfiguration()['key']);
    }

    public function test_payment_authorization () : void {
        $axerve = $this->getAxerveManager();
        $result = $axerve->authorizePayment(new \AtlasByte\Common\PaymentRequest(
            "test123456",
            "EUR",
            100,
            "w.miarelli@besaferate.com"
        ));
        $this->assertNotNull($result);
        $this->assertNotNull($result->getPaymentId());
        $this->assertNotNull($result->getPaymentToken());
    }

    public function test_payment_capture () : void {}

    public function test_payment_methods(): void {
        $axerve = $this->getAxerveManager();
    }

}