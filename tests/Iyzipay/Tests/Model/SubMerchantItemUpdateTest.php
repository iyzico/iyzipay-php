<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\SubMerchantPaymentItemUpdate;
use Iyzipay\Request\SubMerchantPaymentItemUpdateRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubMerchantItemUpdateTest extends IyzipayResourceTestCase
{
    public function test_should_submerchantupdate()
    {
        $this->expectHttpPut();

        $update = SubMerchantPaymentItemUpdate::create(new SubMerchantPaymentItemUpdateRequest(), $this->options);

        $this->verifyResource($update);
    }
}