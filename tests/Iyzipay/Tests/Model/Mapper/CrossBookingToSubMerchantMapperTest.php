<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CrossBookingToSubMerchant;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CrossBookingToSubMerchantMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CrossBookingToSubMerchantMapperTest extends TestCase
{
    public function test_should_map_cross_booking_to_sub_merchant()
    {
        $json = $this->retrieveJsonFile("create-cross-booking.json");

        $crossBookingToSubMerchant = CrossBookingToSubMerchantMapper::create($json)->jsonDecode()->mapCrossBookingToSubMerchant(new CrossBookingToSubMerchant());

        $this->assertNotEmpty($crossBookingToSubMerchant);
        $this->assertEquals(Status::FAILURE, $crossBookingToSubMerchant->getStatus());
        $this->assertEquals("10000", $crossBookingToSubMerchant->getErrorCode());
        $this->assertEquals("error message", $crossBookingToSubMerchant->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $crossBookingToSubMerchant->getErrorGroup());
        $this->assertEquals(Locale::TR, $crossBookingToSubMerchant->getLocale());
        $this->assertEquals("1458545234852", $crossBookingToSubMerchant->getSystemTime());
        $this->assertEquals("123456", $crossBookingToSubMerchant->getConversationId());
        $this->assertJson($crossBookingToSubMerchant->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $crossBookingToSubMerchant->getRawResult());
    }
}