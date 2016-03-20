<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\BKMAuth;
use Iyzipay\Request\RetrieveBKMAuthRequest;

class BKMAuthTest extends IyzipayResourceTestCase
{
    public function test_should_get_bkm_auth()
    {
        $this->expectHttpPost();

        $bkmAuth = BKMAuth::retrieve(new RetrieveBKMAuthRequest(), $this->options);

        $this->verifyResource($bkmAuth);
    }
}