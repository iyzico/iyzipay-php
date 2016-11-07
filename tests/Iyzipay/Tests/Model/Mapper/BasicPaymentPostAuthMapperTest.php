<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicPaymentPostAuth;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicPaymentPostAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicPaymentPostAuthMapperTest extends TestCase
{
    public function test_should_map_basic_payment_post_auth()
    {
        $json = $this->retrieveJsonFile("create-basic-payment.json");

        $basicPaymentPostAuth = BasicPaymentPostAuthMapper::create($json)->jsonDecode()->mapBasicPaymentPostAuth(new BasicPaymentPostAuth());

        $this->assertNotEmpty($basicPaymentPostAuth);
        $this->assertEquals(Status::FAILURE, $basicPaymentPostAuth->getStatus());
        $this->assertEquals("10000", $basicPaymentPostAuth->getErrorCode());
        $this->assertEquals("error message", $basicPaymentPostAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicPaymentPostAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicPaymentPostAuth->getLocale());
        $this->assertEquals("1458545234852", $basicPaymentPostAuth->getSystemTime());
        $this->assertEquals("123456", $basicPaymentPostAuth->getConversationId());
        $this->assertJson($basicPaymentPostAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicPaymentPostAuth->getRawResult());
        $this->assertEquals("1.0", $basicPaymentPostAuth->getPrice());
        $this->assertEquals("1.1", $basicPaymentPostAuth->getPaidPrice());
        $this->assertEquals("1", $basicPaymentPostAuth->getInstallment());
        $this->assertEquals("1", $basicPaymentPostAuth->getPaymentId());
        $this->assertEquals("10.00000000", $basicPaymentPostAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $basicPaymentPostAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $basicPaymentPostAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $basicPaymentPostAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $basicPaymentPostAuth->getCardAssociation());
        $this->assertEquals("Bonus", $basicPaymentPostAuth->getCardFamily());
        $this->assertEquals("cardToken", $basicPaymentPostAuth->getCardToken());
        $this->assertEquals("cardUserKey", $basicPaymentPostAuth->getCardUserKey());
        $this->assertEquals("554960", $basicPaymentPostAuth->getBinNumber());
        $this->assertEquals("1", $basicPaymentPostAuth->getPaymentTransactionId());
        $this->assertEquals("546382", $basicPaymentPostAuth->getAuthCode());
        $this->assertEquals("connectorName", $basicPaymentPostAuth->getConnectorName());
        $this->assertEquals("TRY", $basicPaymentPostAuth->getCurrency());
        $this->assertEquals("AUTH", $basicPaymentPostAuth->getPhase());
    }
}