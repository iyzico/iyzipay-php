<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectBKMAuth;
use Iyzipay\Request\RetrieveBKMAuthRequest;

class ConnectBKMAuthTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_connect_bkm_auth()
    {
        $this->expectHttpPost();

        $connectBKMAuth = ConnectBKMAuth::retrieve(new RetrieveBKMAuthRequest(), $this->options);

        $this->verifyResource($connectBKMAuth);
    }
}