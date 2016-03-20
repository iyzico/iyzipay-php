<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ApiTest;

class ApiTestTest extends IyzipayResourceTestCase
{
    public function test_should_test()
    {
        $this->expectHttpGet();

        $iyzipayResource = ApiTest::retrieve($this->options);

        $this->verifyResource($iyzipayResource);
    }
}