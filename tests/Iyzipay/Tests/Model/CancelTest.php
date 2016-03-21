<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Cancel;
use Iyzipay\Request\CreateCancelRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CancelTest extends IyzipayResourceTestCase
{
    public function test_should_cancel()
    {
        $this->expectHttpPost();

        $cancel = Cancel::create(new CreateCancelRequest(), $this->options);

        $this->verifyResource($cancel);
    }
}