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

        $basicPayment = BasicPaymentMapper::create($json)->jsonDecode()->mapBasicPayment(new BasicPayment());

        $this->assertNotEmpty($basicPayment);
        $this->assertEquals(Status::FAILURE, $basicPayment->getStatus());
        $this->assertEquals("10000", $basicPayment->getErrorCode());
        $this->assertEquals("error message", $basicPayment->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicPayment->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicPayment->getLocale());
        $this->assertEquals("1458545234852", $basicPayment->getSystemTime());
        $this->assertEquals("123456", $basicPayment->getConversationId());
        $this->assertJson($basicPayment->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicPayment->getRawResult());
        $this->assertEquals("1.0", $basicPayment->getPrice());
        $this->assertEquals("1.1", $basicPayment->getPaidPrice());
        $this->assertEquals("1", $basicPayment->getInstallment());
        $this->assertEquals("1", $basicPayment->getPaymentId());
        $this->assertEquals("10.00000000", $basicPayment->getMerchantCommissionRate());
        $this->assertEquals("0.1", $basicPayment->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $basicPayment->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $basicPayment->getCardType());
        $this->assertEquals("MASTER_CARD", $basicPayment->getCardAssociation());
        $this->assertEquals("Bonus", $basicPayment->getCardFamily());
        $this->assertEquals("cardToken", $basicPayment->getCardToken());
        $this->assertEquals("cardUserKey", $basicPayment->getCardUserKey());
        $this->assertEquals("554960", $basicPayment->getBinNumber());
        $this->assertEquals("1", $basicPayment->getPaymentTransactionId());
        $this->assertEquals("546382", $basicPayment->getAuthCode());
        $this->assertEquals("connectorName", $basicPayment->getConnectorName());
    }
}