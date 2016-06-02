<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicBkm;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicBkmMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicBkmMapperTest extends TestCase
{
    public function test_should_map_connect_bkm_auth()
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
                "token": "token",
                "callbackUrl": "https://www.iyzico.com",
                "paymentStatus": "SUCCESS"
            }';

        $connectBKMAuth = BasicBkmMapper::create($json)->jsonDecode()->mapBasicBkm(new BasicBkm());

        $this->assertNotEmpty($connectBKMAuth);
        $this->assertEquals(Status::SUCCESS, $connectBKMAuth->getStatus());
        $this->assertEmpty($connectBKMAuth->getErrorCode());
        $this->assertEmpty($connectBKMAuth->getErrorMessage());
        $this->assertEmpty($connectBKMAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $connectBKMAuth->getLocale());
        $this->assertEquals("1458545234852", $connectBKMAuth->getSystemTime());
        $this->assertEquals("123456", $connectBKMAuth->getConversationId());
        $this->assertJson($connectBKMAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $connectBKMAuth->getRawResult());
        $this->assertEquals("1.0", $connectBKMAuth->getPrice());
        $this->assertEquals("1.1", $connectBKMAuth->getPaidPrice());
        $this->assertEquals("1", $connectBKMAuth->getInstallment());
        $this->assertEquals("1", $connectBKMAuth->getPaymentId());
        $this->assertEquals("10.00000000", $connectBKMAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $connectBKMAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $connectBKMAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $connectBKMAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $connectBKMAuth->getCardAssociation());
        $this->assertEquals("Bonus", $connectBKMAuth->getCardFamily());
        $this->assertEquals("cardToken", $connectBKMAuth->getCardToken());
        $this->assertEquals("cardUserKey", $connectBKMAuth->getCardUserKey());
        $this->assertEquals("554960", $connectBKMAuth->getBinNumber());
        $this->assertEquals("1", $connectBKMAuth->getPaymentTransactionId());
        $this->assertEquals("546382", $connectBKMAuth->getAuthCode());
        $this->assertEquals("connectorName", $connectBKMAuth->getConnectorName());
        $this->assertEquals("token", $connectBKMAuth->getToken());
        $this->assertEquals("https://www.iyzico.com", $connectBKMAuth->getCallbackUrl());
        $this->assertEquals("SUCCESS", $connectBKMAuth->getPaymentStatus());
    }
}