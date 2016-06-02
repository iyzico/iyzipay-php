<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BkmInitialize;
use Iyzipay\Request\CreateBkmInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BkmInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_bkm()
    {
        $this->expectHttpPost();

        $bkmInitialize = BkmInitialize::create(new CreateBkmInitializeRequest(), $this->options);

        $this->verifyResource($bkmInitialize);
    }
}
