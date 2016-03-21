<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectCancel;
use Iyzipay\Request\CreateCancelRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectCancelTest extends IyzipayResourceTestCase
{
    public function test_should_cancel_connect()
    {
        $this->expectHttpPost();

        $connectCancel = ConnectCancel::create(new CreateCancelRequest(), $this->options);

        $this->verifyResource($connectCancel);
    }
}