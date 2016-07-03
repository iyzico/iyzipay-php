<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicBkmInitialize;
use Iyzipay\Request\CreateBasicBkmInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicBkmInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_basic_bkm()
    {
        $this->expectHttpPost();

        $basicBkmInitialize = BasicBkmInitialize::create(new CreateBasicBkmInitializeRequest(), $this->options);

        $this->verifyResource($basicBkmInitialize);
    }
}