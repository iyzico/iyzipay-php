<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicPaymentResource;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicPaymentResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicPaymentResourceMapperTest extends TestCase
{
    public function test_should_map_connect_payment()
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
                "connectorName": "connectorName",
                "currency": "TRY"
            }';

        $connectPayment = BasicPaymentResourceMapper::create($json)->jsonDecode()->mapConnectPayment(new BasicPaymentResource());

        $this->assertNotEmpty($connectPayment);
        $this->assertEquals(Status::SUCCESS, $connectPayment->getStatus());
        $this->assertEmpty($connectPayment->getErrorCode());
        $this->assertEmpty($connectPayment->getErrorMessage());
        $this->assertEmpty($connectPayment->getErrorGroup());
        $this->assertEquals(Locale::TR, $connectPayment->getLocale());
        $this->assertEquals("1458545234852", $connectPayment->getSystemTime());
        $this->assertEquals("123456", $connectPayment->getConversationId());
        $this->assertJson($connectPayment->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $connectPayment->getRawResult());
        $this->assertEquals("1.0", $connectPayment->getPrice());
        $this->assertEquals("1.1", $connectPayment->getPaidPrice());
        $this->assertEquals("1", $connectPayment->getInstallment());
        $this->assertEquals("1", $connectPayment->getPaymentId());
        $this->assertEquals("10.00000000", $connectPayment->getMerchantCommissionRate());
        $this->assertEquals("0.1", $connectPayment->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $connectPayment->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $connectPayment->getCardType());
        $this->assertEquals("MASTER_CARD", $connectPayment->getCardAssociation());
        $this->assertEquals("Bonus", $connectPayment->getCardFamily());
        $this->assertEquals("cardToken", $connectPayment->getCardToken());
        $this->assertEquals("cardUserKey", $connectPayment->getCardUserKey());
        $this->assertEquals("554960", $connectPayment->getBinNumber());
        $this->assertEquals("1", $connectPayment->getPaymentTransactionId());
        $this->assertEquals("546382", $connectPayment->getAuthCode());
        $this->assertEquals("connectorName", $connectPayment->getConnectorName());
        $this->assertEquals("TRY", $connectPayment->getCurrency());
    }
}