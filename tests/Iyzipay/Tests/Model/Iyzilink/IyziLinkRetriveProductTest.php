<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetrieveProduct;
use Iyzipay\Request;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkRetriveProductTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_product_iyzilink()
    {
        $this->expectHttpGetv2();

        $retriveProduct = IyziLinkRetrieveProduct::create(new Request(), $this->options, 'test');

        $this->verifyResource($retriveProduct);
    }
}