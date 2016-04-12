<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectThreeDSInitializePreAuth;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectThreeDSInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_threeds()
    {
        $this->expectHttpPost();

        $connectThreeDSInitializePreAuth = ConnectThreeDSInitializePreAuth::create(new CreateConnectThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($connectThreeDSInitializePreAuth);
    }
}