<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Loyalty;
use Iyzipay\Request\RetrieveLoyaltyRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class LoyaltyTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_loyalty()
    {
        $this->expectHttpPost();

        $loyalty = Loyalty::retrieve(new RetrieveLoyaltyRequest(), $this->options);

        $this->verifyResource($loyalty);
    }
}