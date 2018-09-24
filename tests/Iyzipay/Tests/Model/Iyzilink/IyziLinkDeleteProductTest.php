<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkDeleteProduct;
use Iyzipay\Request;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkDeleteProductTest extends IyzipayResourceTestCase
{
    public function test_should_delete_product_iyzilink()
    {
        $this->expectHttpDelete();

        $deleteProduct = IyziLinkDeleteProduct::create(new Request(), $this->options, 'test');

        $this->verifyResource($deleteProduct);
    }
}