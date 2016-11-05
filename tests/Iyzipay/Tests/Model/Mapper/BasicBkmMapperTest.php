<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicBkm;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicBkmMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicBkmMapperTest extends TestCase
{
    public function test_should_map_basic_bkm()
    {
        $json = $this->retrieveJsonFile("retrieve-basic-bkm.json");

        $basicBkm = BasicBkmMapper::create($json)->jsonDecode()->mapBasicBkm(new BasicBkm());

        $this->assertNotEmpty($basicBkm);
        $this->assertEquals(Status::FAILURE, $basicBkm->getStatus());
        $this->assertEquals("10000", $basicBkm->getErrorCode());
        $this->assertEquals("error message", $basicBkm->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicBkm->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicBkm->getLocale());
        $this->assertEquals("1458545234852", $basicBkm->getSystemTime());
        $this->assertEquals("123456", $basicBkm->getConversationId());
        $this->assertJson($basicBkm->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicBkm->getRawResult());
        $this->assertEquals("1.0", $basicBkm->getPrice());
        $this->assertEquals("1.1", $basicBkm->getPaidPrice());
        $this->assertEquals("1", $basicBkm->getInstallment());
        $this->assertEquals("1", $basicBkm->getPaymentId());
        $this->assertEquals("10.00000000", $basicBkm->getMerchantCommissionRate());
        $this->assertEquals("0.1", $basicBkm->getMerchantCommissionRateAmount());
        $this->assertEquals("0.35000000", $basicBkm->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $basicBkm->getCardType());
        $this->assertEquals("MASTER_CARD", $basicBkm->getCardAssociation());
        $this->assertEquals("Bonus", $basicBkm->getCardFamily());
        $this->assertEquals("cardToken", $basicBkm->getCardToken());
        $this->assertEquals("cardUserKey", $basicBkm->getCardUserKey());
        $this->assertEquals("554960", $basicBkm->getBinNumber());
        $this->assertEquals("1", $basicBkm->getPaymentTransactionId());
        $this->assertEquals("546382", $basicBkm->getAuthCode());
        $this->assertEquals("connectorName", $basicBkm->getConnectorName());
        $this->assertEquals(Currency::TL, $basicBkm->getCurrency());
        $this->assertEquals("token", $basicBkm->getToken());
        $this->assertEquals("https://www.iyzico.com", $basicBkm->getCallbackUrl());
        $this->assertEquals("SUCCESS", $basicBkm->getPaymentStatus());
        $this->assertEquals("AUTH", $basicBkm->getPhase());
    }
}