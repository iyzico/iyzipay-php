<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectThreeDSAuth;
use Iyzipay\Request\CreateConnectThreeDSAuthRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectThreeDSAuthTest extends IyzipayResourceTestCase
{
    public function test_should_auth_connect_threeds()
    {
        $this->expectHttpPost();

        $connectThreeDSAuth = ConnectThreeDSAuth::create(new CreateConnectThreeDSAuthRequest(), $this->options);

        $this->verifyResource($connectThreeDSAuth);
    }
}