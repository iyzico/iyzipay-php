<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectThreeDSInitialize;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectThreeDSInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_threeds()
    {
        $this->expectHttpPost();

        $connectThreeDSInitialize = ConnectThreeDSInitialize::create(new CreateConnectThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($connectThreeDSInitialize);
    }
}