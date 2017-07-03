<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\RefundChargedFromMerchantMapper;
use Iyzipay\Model\RefundChargedFromMerchant;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class RefundChargedFromMerchantMapperTest extends TestCase
{
    public function test_should_map_refund_charged_from_merchant()
    {
        $json = $this->retrieveJsonFile("refund.json");

        $refundChargedFromMerchant = RefundChargedFromMerchantMapper::create($json)->jsonDecode()->mapRefundChargedFromMerchant(new RefundChargedFromMerchant());

        $this->assertNotEmpty($refundChargedFromMerchant);
        $this->assertEquals(Status::FAILURE, $refundChargedFromMerchant->getStatus());
        $this->assertEquals("10000", $refundChargedFromMerchant->getErrorCode());
        $this->assertEquals("error message", $refundChargedFromMerchant->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $refundChargedFromMerchant->getErrorGroup());
        $this->assertEquals(Locale::TR, $refundChargedFromMerchant->getLocale());
        $this->assertEquals("1458545234852", $refundChargedFromMerchant->getSystemTime());
        $this->assertEquals("123456", $refundChargedFromMerchant->getConversationId());
        $this->assertJson($refundChargedFromMerchant->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $refundChargedFromMerchant->getRawResult());
        $this->assertEquals("1", $refundChargedFromMerchant->getPaymentId());
        $this->assertEquals("1", $refundChargedFromMerchant->getPaymentTransactionId());
        $this->assertEquals("1", $refundChargedFromMerchant->getPrice());
        $this->assertEquals("TRY", $refundChargedFromMerchant->getCurrency());
        $this->assertEquals("connector name", $refundChargedFromMerchant->getConnectorName());
        $this->assertEquals("1234567", $refundChargedFromMerchant->getAuthCode());
    }
}