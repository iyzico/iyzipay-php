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
                "status":"failure",
                "errorCode":10000,
                "errorMessage":"error message",
                "errorGroup":"ERROR_GROUP",
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

        $basicPaymentPreAuth = BasicPaymentPreAuthMapper::create($json)->jsonDecode()->mapBasicPaymentPreAuth(new BasicPaymentPreAuth());

        $this->assertNotEmpty($basicPaymentPreAuth);
        $this->assertEquals(Status::FAILURE, $basicPaymentPreAuth->getStatus());
        $this->assertEquals("10000", $basicPaymentPreAuth->getErrorCode());
        $this->assertEquals("error message", $basicPaymentPreAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicPaymentPreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicPaymentPreAuth->getLocale());
        $this->assertEquals("1458545234852", $basicPaymentPreAuth->getSystemTime());
        $this->assertEquals("123456", $basicPaymentPreAuth->getConversationId());
        $this->assertJson($basicPaymentPreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicPaymentPreAuth->getRawResult());
        $this->assertEquals("1.0", $basicPaymentPreAuth->getPrice());
        $this->assertEquals("1.1", $basicPaymentPreAuth->getPaidPrice());
        $this->assertEquals("1", $basicPaymentPreAuth->getInstallment());
        $this->assertEquals("1", $basicPaymentPreAuth->getPaymentId());
        $this->assertEquals("10.00000000", $basicPaymentPreAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $basicPaymentPreAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $basicPaymentPreAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $basicPaymentPreAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $basicPaymentPreAuth->getCardAssociation());
        $this->assertEquals("Bonus", $basicPaymentPreAuth->getCardFamily());
        $this->assertEquals("cardToken", $basicPaymentPreAuth->getCardToken());
        $this->assertEquals("cardUserKey", $basicPaymentPreAuth->getCardUserKey());
        $this->assertEquals("554960", $basicPaymentPreAuth->getBinNumber());
        $this->assertEquals("1", $basicPaymentPreAuth->getPaymentTransactionId());
        $this->assertEquals("546382", $basicPaymentPreAuth->getAuthCode());
        $this->assertEquals("connectorName", $basicPaymentPreAuth->getConnectorName());
    }
}