<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicPayment;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicPaymentMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicPaymentMapperTest extends TestCase
{
    public function test_should_map_connect_payment_auth()
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

        $connectPaymentAuth = BasicPaymentMapper::create($json)->jsonDecode()->mapBasicPayment(new BasicPayment());

        $this->assertNotEmpty($connectPaymentAuth);
        $this->assertEquals(Status::SUCCESS, $connectPaymentAuth->getStatus());
        $this->assertEmpty($connectPaymentAuth->getErrorCode());
        $this->assertEmpty($connectPaymentAuth->getErrorMessage());
        $this->assertEmpty($connectPaymentAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $connectPaymentAuth->getLocale());
        $this->assertEquals("1458545234852", $connectPaymentAuth->getSystemTime());
        $this->assertEquals("123456", $connectPaymentAuth->getConversationId());
        $this->assertJson($connectPaymentAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $connectPaymentAuth->getRawResult());
        $this->assertEquals("1.0", $connectPaymentAuth->getPrice());
        $this->assertEquals("1.1", $connectPaymentAuth->getPaidPrice());
        $this->assertEquals("1", $connectPaymentAuth->getInstallment());
        $this->assertEquals("1", $connectPaymentAuth->getPaymentId());
        $this->assertEquals("10.00000000", $connectPaymentAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $connectPaymentAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $connectPaymentAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $connectPaymentAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $connectPaymentAuth->getCardAssociation());
        $this->assertEquals("Bonus", $connectPaymentAuth->getCardFamily());
        $this->assertEquals("cardToken", $connectPaymentAuth->getCardToken());
        $this->assertEquals("cardUserKey", $connectPaymentAuth->getCardUserKey());
        $this->assertEquals("554960", $connectPaymentAuth->getBinNumber());
        $this->assertEquals("1", $connectPaymentAuth->getPaymentTransactionId());
        $this->assertEquals("546382", $connectPaymentAuth->getAuthCode());
        $this->assertEquals("connectorName", $connectPaymentAuth->getConnectorName());
    }
}