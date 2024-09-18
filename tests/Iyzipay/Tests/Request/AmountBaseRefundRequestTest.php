<?php

namespace Iyzipay\Tests\Request;

//use Iyzipay\Model\Locale;
use Iyzipay\Request\AmountBaseRefundRequest;
use Iyzipay\Tests\TestCase;

class AmountBaseRefundRequestTest extends TestCase {
    public function testShouldGetJsonObject(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

//        $this->assertEquals(Locale::TR, $jsonObject['locale']);
//        $this->assertEquals('123456789', $jsonObject['conversationId']);
        $this->assertEquals('2921546163', $jsonObject['paymentId']);
        $this->assertEquals('3.0', $jsonObject['price']);
        $this->assertEquals('85.34.78.112', $jsonObject['ip']);
    }

    public function testShouldConvertToPkiRequestString(): void {
        $request = $this->prepareRequest();

//        $str = '[' .
//            'locale=tr,' .
//            'conversationId=123456789,' .
//            'paymentId=2921546163,' .
//            'price-3,' .
//            'ip=85.34.78.112' .
//            ']';

        $str = '[' .
            'paymentId=2921546163,' .
            'price=3.0,' .
            'ip=85.34.78.112' .
            ']';

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();

//        $json = '
//            {
//                "locale":"tr",
//                "conversationId":"123456789",
//                "paymentId":"2921546163",
//                "price":3,
//                "ip":"85.34.78.112"
//            }';

        $json = '
            {
                "paymentId":"2921546163",
                "price":"3.0",
                "ip":"85.34.78.112"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest(): AmountBaseRefundRequest {
        $request = new AmountBaseRefundRequest();
//        $request->setLocale(Locale::TR);
//        $request->setConversationId('123456789');
        $request->setPaymentId('2921546163');
        $request->setPrice('3.0');
        $request->setIp('85.34.78.112');
        return $request;
    }
}
