<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkUpdateProduct;
use Iyzipay\Request\Iyzilink\IyziLinkSaveProductRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkUpdateProductTest extends IyzipayResourceTestCase
{
    public function test_should_update_product_iyzilink()
    {
        $this->expectHttpPut();

        $updateProduct = IyziLinkUpdateProduct::create(new IyziLinkSaveProductRequest(), $this->options,'test');

        $this->verifyResource($updateProduct);
    }
}