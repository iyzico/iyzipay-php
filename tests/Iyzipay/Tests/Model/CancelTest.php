<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Cancel;
use Iyzipay\Request\CreateCancelRequest;

class CancelTest extends IyzipayResourceTestCase
{
    public function test_should_cancel()
    {
        $this->expectHttpPost();

        $cancel = Cancel::create(new CreateCancelRequest(), $this->options);

        $this->verifyResource($cancel);
    }
}