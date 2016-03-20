<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectThreeDSInitialize;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;

class ConnectThreeDSInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_threeds()
    {
        $this->expectHttpPost();

        $connectThreeDSInitialize = ConnectThreeDSInitialize::create(new CreateConnectThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($connectThreeDSInitialize);
    }
}