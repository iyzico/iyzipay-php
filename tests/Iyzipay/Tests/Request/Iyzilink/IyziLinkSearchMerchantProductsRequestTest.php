<?php

namespace Iyzipay\Tests\Request\Iyzilink;

use Iyzipay\Model\Status;
use Iyzipay\Model\Locale;
use Iyzipay\Tests\TestCase;
use Iyzipay\Request\Iyzilink\IyziLinkSearchMerchantProductsRequest;

class IyziLinkSearchMerchantProductsRequestTest extends TestCase {
    public function testShouldCreateIyziLinkSearchMerchantProductsRequest(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals(1, $jsonObject['page']);
        $this->assertEquals(10, $jsonObject['count']);
    }

    public function prepareRequest(): IyziLinkSearchMerchantProductsRequest {
        $request = new IyziLinkSearchMerchantProductsRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('123456');
        $request->setPage(1);
        $request->setCount(10);

        return $request;
    }
}
