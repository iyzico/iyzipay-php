<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectCancel;
use Iyzipay\Request\CreateCancelRequest;

class ConnectCancelTest extends IyzipayResourceTestCase
{
    public function test_should_cancel_connect()
    {
        $this->expectHttpPost();

        $connectCancel = ConnectCancel::create(new CreateCancelRequest(), $this->options);

        $this->verifyResource($connectCancel);
    }
}