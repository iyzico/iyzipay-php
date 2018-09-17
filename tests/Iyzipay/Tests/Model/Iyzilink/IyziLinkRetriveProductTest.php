<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveProduct;
use Iyzipay\Request;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkRetriveProductTest extends IyzipayResourceTestCase
{
    public function test_should_retrive_product_iyzilink()
    {
        $this->expectHttpGetv2();

        $retriveProduct = IyziLinkRetriveProduct::create(new Request(), $this->options, 'test');

        $this->verifyResource($retriveProduct);
    }
}