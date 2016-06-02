<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicBkmInitialize;
use Iyzipay\Request\CreateBasicBkmInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicBkmInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_bkm()
    {
        $this->expectHttpPost();

        $connectBKMInitialize = BasicBkmInitialize::create(new CreateBasicBkmInitializeRequest(), $this->options);

        $this->verifyResource($connectBKMInitialize);
    }
}