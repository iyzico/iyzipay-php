<?php

namespace Iyzipay\Tests\Request\Iyzilink;

use Iyzipay\Model\Status;
use Iyzipay\Model\Locale;
use Iyzipay\Tests\TestCase;
use Iyzipay\Request\Iyzilink\IyziLinkUpdateProductStatusRequest;

class IyziLinkUpdateProductStatusRequestTest extends TestCase {
    public function testShouldUpdateProductStatus(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("AAM", $jsonObject["token"]);
        $this->assertEquals(Status::PASSIVE, $jsonObject['productStatus']);
    }

    public function prepareRequest(): IyziLinkUpdateProductStatusRequest {
        $request = new IyziLinkUpdateProductStatusRequest();
        $request->setLocale(Locale::TR);
        $request->setToken('AAM');
        $request->setProductStatus(Status::PASSIVE);

        return $request;
    }
}
