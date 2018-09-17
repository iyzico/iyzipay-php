<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetrieveAllProduct;
use Iyzipay\Request\PagininRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkRetriveAllProductTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_all_product_iyzilink()
    {
        $this->expectHttpGetv2();

        $retriveAll = IyziLinkRetrieveAllProduct::create(new PagininRequest(), $this->options);

        $this->verifyResource($retriveAll);
    }
}