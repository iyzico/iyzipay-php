<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkSaveProduct;
use Iyzipay\Request\Iyzilink\IyziLinkSaveProductRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkSaveProductTest extends IyzipayResourceTestCase
{
    public function test_should_save_product_iyzilink()
    {
        $this->expectHttpPost();

        $saveProduct = IyziLinkSaveProduct::create(new IyziLinkSaveProductRequest(), $this->options);

        $this->verifyResource($saveProduct);
    }
}