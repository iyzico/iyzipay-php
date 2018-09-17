<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveAllProduct;
use Iyzipay\Request\Iyzilink\IyziLinkRetriveAllPagininRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkRetriveAllProductTest extends IyzipayResourceTestCase
{
    public function test_should_retrive_all_product_iyzilink()
    {
        $this->expectHttpGetv2();

        $retriveAll = IyziLinkRetriveAllProduct::create(new IyziLinkRetriveAllPagininRequest(), $this->options);

        $this->verifyResource($retriveAll);
    }
}