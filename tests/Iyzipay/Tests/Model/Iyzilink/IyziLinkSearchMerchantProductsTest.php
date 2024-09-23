<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkSearchMerchantProducts;
use Iyzipay\Request\Iyzilink\IyziLinkSearchMerchantProductsRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkSearchMerchantProductsTest extends IyzipayResourceTestCase {
    public function testShouldSearchMerchantProducts(): void {
        $request = new IyziLinkSearchMerchantProductsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId('123456');
        $request->setPage(1);
        $request->setCount(10);

        $this->expectHttpGetV2();
        $iyziLinkSearchMerchantProducts = IyziLinkSearchMerchantProducts::create($request, $this->options);
        $this->verifyResource($iyziLinkSearchMerchantProducts);
    }
}
