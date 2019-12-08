<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\UCSInitialize;
use Iyzipay\Request\UCSInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class UCSInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_ucs()
    {
        $this->expectHttpPost();
        $init = UCSInitialize::create(new UCSInitializeRequest(), $this->options);
        $this->verifyResource($init);
    }
}