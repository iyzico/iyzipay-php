<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\SubMerchantPaymentItemResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\SubMerchantPaymentItemUpdate;
use Iyzipay\Tests\TestCase;

class SubMerchantPaymentItemResourceMapperTest extends TestCase
{
    public function test_should_map_resource_sub_merchant_payment_item_update()
    {
        $json = $this->retrieveJsonFile("sub-merchant-payment-item-update.json");

        $update = SubMerchantPaymentItemResourceMapper::create($json)->jsonDecode()->mapSubMerchantPaymentItemResource(new SubMerchantPaymentItemUpdate());

        $this->assertNotEmpty($update);
        $this->assertEquals(Status::SUCCESS, $update->getStatus());
        $this->assertEquals(Locale::TR, $update->getLocale());
        $this->assertEquals("dVNPU4zjThEHTRqlExIhh7VVSBA=", $update->getSubMerchantKey());
        $this->assertEquals("11606407", $update->getPaymentTransactionId());
        $this->assertEquals(0.1, $update->getSubMerchantPrice());
        $this->assertJson($update->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $update->getRawResult());
    }
}