<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\BKMInitialize;
use Iyzipay\Request\CreateBKMInitializeRequest;

class BKMInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_bkm()
    {
        $this->expectHttpPost();

        $bkmInitialize = BKMInitialize::create(new CreateBKMInitializeRequest(), $this->options);

        $this->verifyResource($bkmInitialize);
    }
}