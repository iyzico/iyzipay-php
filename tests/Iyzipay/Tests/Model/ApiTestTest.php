<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ApiTest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ApiTestTest extends IyzipayResourceTestCase
{
    public function test_should_test()
    {
        $this->expectHttpGet();

        $iyzipayResource = ApiTest::retrieve($this->options);

        $this->verifyResource($iyzipayResource);
    }
}