<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\CrossBookingToSubMerchant;
use Iyzipay\Request\CreateCrossBookingRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CrossBookingToSubMerchantTest extends IyzipayResourceTestCase
{
    public function test_should_cross_booking_to_sub_merchant()
    {
        $this->expectHttpPost();

        $crossBookingToSubMerchant = CrossBookingToSubMerchant::create(new CreateCrossBookingRequest(), $this->options);

        $this->verifyResource($crossBookingToSubMerchant);
    }
}