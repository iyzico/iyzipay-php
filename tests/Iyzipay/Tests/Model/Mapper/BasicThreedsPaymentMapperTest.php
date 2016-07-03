<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicThreedsPayment;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicThreedsPaymentMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicThreedsPaymentMapperTest extends TestCase
{
    public function test_should_map_basic_threeds_payment()
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
                "connectorName": "connectorName",
                "currency": "TRY"
            }';

        $basicThreedsPayment = BasicThreedsPaymentMapper::create($json)->jsonDecode()->mapBasicThreedsPayment(new BasicThreedsPayment());

        $this->assertNotEmpty($basicThreedsPayment);
        $this->assertEquals(Status::FAILURE, $basicThreedsPayment->getStatus());
        $this->assertEquals("10000", $basicThreedsPayment->getErrorCode());
        $this->assertEquals("error message", $basicThreedsPayment->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicThreedsPayment->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicThreedsPayment->getLocale());
        $this->assertEquals("1458545234852", $basicThreedsPayment->getSystemTime());
        $this->assertEquals("123456", $basicThreedsPayment->getConversationId());
        $this->assertJson($basicThreedsPayment->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicThreedsPayment->getRawResult());
        $this->assertEquals("1.0", $basicThreedsPayment->getPrice());
        $this->assertEquals("1.1", $basicThreedsPayment->getPaidPrice());
        $this->assertEquals("1", $basicThreedsPayment->getInstallment());
        $this->assertEquals("1", $basicThreedsPayment->getPaymentId());
        $this->assertEquals("10.00000000", $basicThreedsPayment->getMerchantCommissionRate());
        $this->assertEquals("0.1", $basicThreedsPayment->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $basicThreedsPayment->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $basicThreedsPayment->getCardType());
        $this->assertEquals("MASTER_CARD", $basicThreedsPayment->getCardAssociation());
        $this->assertEquals("Bonus", $basicThreedsPayment->getCardFamily());
        $this->assertEquals("cardToken", $basicThreedsPayment->getCardToken());
        $this->assertEquals("cardUserKey", $basicThreedsPayment->getCardUserKey());
        $this->assertEquals("554960", $basicThreedsPayment->getBinNumber());
        $this->assertEquals("1", $basicThreedsPayment->getPaymentTransactionId());
        $this->assertEquals("546382", $basicThreedsPayment->getAuthCode());
        $this->assertEquals("connectorName", $basicThreedsPayment->getConnectorName());
        $this->assertEquals("TRY", $basicThreedsPayment->getCurrency());
    }
}