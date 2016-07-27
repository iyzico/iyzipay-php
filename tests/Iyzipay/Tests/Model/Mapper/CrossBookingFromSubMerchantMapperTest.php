<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CrossBookingFromSubMerchant;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CrossBookingFromSubMerchantMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CrossBookingFromSubMerchantMapperTest extends TestCase
{
    public function test_should_map_cross_booking_from_sub_merchant()
    {
        $json = $this->retrieveJsonFile("create-cross-booking.json");

        $crossBookingFromSubMerchant = CrossBookingFromSubMerchantMapper::create($json)->jsonDecode()->mapCrossBookingFromSubMerchant(new CrossBookingFromSubMerchant());

        $this->assertNotEmpty($crossBookingFromSubMerchant);
        $this->assertEquals(Status::FAILURE, $crossBookingFromSubMerchant->getStatus());
        $this->assertEquals("10000", $crossBookingFromSubMerchant->getErrorCode());
        $this->assertEquals("error message", $crossBookingFromSubMerchant->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $crossBookingFromSubMerchant->getErrorGroup());
        $this->assertEquals(Locale::TR, $crossBookingFromSubMerchant->getLocale());
        $this->assertEquals("1458545234852", $crossBookingFromSubMerchant->getSystemTime());
        $this->assertEquals("123456", $crossBookingFromSubMerchant->getConversationId());
        $this->assertJson($crossBookingFromSubMerchant->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $crossBookingFromSubMerchant->getRawResult());
    }
}