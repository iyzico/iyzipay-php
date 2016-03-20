<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectBKMInitialize;
use Iyzipay\Request\CreateConnectBKMInitializeRequest;

class ConnectBKMInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_bkm()
    {
        $this->expectHttpPost();

        $connectBKMInitialize = ConnectBKMInitialize::create(new CreateConnectBKMInitializeRequest(), $this->options);

        $this->verifyResource($connectBKMInitialize);
    }
}