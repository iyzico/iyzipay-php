<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BKMInitialize;
use Iyzipay\Request\CreateBKMInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BKMInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_bkm()
    {
        $this->expectHttpPost();

        $bkmInitialize = BKMInitialize::create(new CreateBKMInitializeRequest(), $this->options);

        $this->verifyResource($bkmInitialize);
    }
}