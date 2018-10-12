<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\SubMerchantPaymentItemMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\SubMerchantPaymentItemUpdate;
use Iyzipay\Tests\TestCase;

class SubMerchantPaymentItemMapperTest extends TestCase
{
    public function test_should_map_sub_merchant_payment_item_update()
    {
        $json = $this->retrieveJsonFile("sub-merchant-payment-item-update.json");

        $update = SubMerchantPaymentItemMapper::create($json)->jsonDecode()->mapSubMerchantPaymentItem(new SubMerchantPaymentItemUpdate());

        $this->assertNotEmpty($update);
        $this->assertEquals(Status::SUCCESS, $update->getStatus());
        $this->assertEquals(Locale::TR, $update->getLocale());
        $this->assertEquals("dVNPU4zjThEHTRqlExIhh7VVSBA=", $update->getSubMerchantKey());
        $this->assertJson($update->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $update->getRawResult());
    }
}