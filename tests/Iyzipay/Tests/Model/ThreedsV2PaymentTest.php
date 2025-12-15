<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsV2Payment;
use Iyzipay\Request\CreateThreedsV2PaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsV2PaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_threeds_v2_payment()
    {
        $this->expectHttpPost();

        $threedsV2Payment = ThreedsV2Payment::create(new CreateThreedsV2PaymentRequest(), $this->options);

        $this->verifyResource($threedsV2Payment);
    }
}