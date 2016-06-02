<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicPaymentPreAuth;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicPaymentPreAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicPaymentPreAuthMapperTest extends TestCase
{
    public function test_should_map_connect_payment_pre_auth()
    {
        $json = '
            {
                "status":"success",
                "errorCode":null,
                "errorMessage":null,
                "errorGroup":null,
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "price": 1.0,
                "paidPrice": 1.1,
                "installment": 1,
                "paymentId": "1",
                "merchantCommissionRate": 10.00000000,
                "merchantCommissionRateAmount": 0.1,
                "iyziCommissionFee": 0.35000000,
                "cardType": "CREDIT_CARD",
                "cardAssociation": "MASTER_CARD",
                "cardFamily": "Bonus",
                "cardToken": "cardToken",
                "cardUserKey": "cardUserKey",
                "binNumber": "554960",
                "paymentTransactionId": "1",
                "authCode": "546382",
                "connectorName": "connectorName"
            }';

        $connectPaymentPreAuth = BasicPaymentPreAuthMapper::create($json)->jsonDecode()->mapConnectPaymentPreAuth(new BasicPaymentPreAuth());

        $this->assertNotEmpty($connectPaymentPreAuth);
        $this->assertEquals(Status::SUCCESS, $connectPaymentPreAuth->getStatus());
        $this->assertEmpty($connectPaymentPreAuth->getErrorCode());
        $this->assertEmpty($connectPaymentPreAuth->getErrorMessage());
        $this->assertEmpty($connectPaymentPreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $connectPaymentPreAuth->getLocale());
        $this->assertEquals("1458545234852", $connectPaymentPreAuth->getSystemTime());
        $this->assertEquals("123456", $connectPaymentPreAuth->getConversationId());
        $this->assertJson($connectPaymentPreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $connectPaymentPreAuth->getRawResult());
        $this->assertEquals("1.0", $connectPaymentPreAuth->getPrice());
        $this->assertEquals("1.1", $connectPaymentPreAuth->getPaidPrice());
        $this->assertEquals("1", $connectPaymentPreAuth->getInstallment());
        $this->assertEquals("1", $connectPaymentPreAuth->getPaymentId());
        $this->assertEquals("10.00000000", $connectPaymentPreAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $connectPaymentPreAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $connectPaymentPreAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $connectPaymentPreAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $connectPaymentPreAuth->getCardAssociation());
        $this->assertEquals("Bonus", $connectPaymentPreAuth->getCardFamily());
        $this->assertEquals("cardToken", $connectPaymentPreAuth->getCardToken());
        $this->assertEquals("cardUserKey", $connectPaymentPreAuth->getCardUserKey());
        $this->assertEquals("554960", $connectPaymentPreAuth->getBinNumber());
        $this->assertEquals("1", $connectPaymentPreAuth->getPaymentTransactionId());
        $this->assertEquals("546382", $connectPaymentPreAuth->getAuthCode());
        $this->assertEquals("connectorName", $connectPaymentPreAuth->getConnectorName());
    }
}