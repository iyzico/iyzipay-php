<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Bkm;
use Iyzipay\Request\RetrieveBkmRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BkmTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_bkm()
    {
        $this->expectHttpPost();

        $bkm = Bkm::retrieve(new RetrieveBkmRequest(), $this->options);

        $this->verifyResource($bkm);
    }
}