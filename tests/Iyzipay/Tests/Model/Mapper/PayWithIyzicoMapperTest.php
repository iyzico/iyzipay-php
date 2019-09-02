<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\PayWithIyzico;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PayWithIyzicoMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PayWithIyzicoMapperTest extends TestCase
{
    public function test_should_map_pay_with_iyzico()
    {
        $json = $this->retrieveJsonFile("retrieve-pay-with-iyzico.json");

        $payWithIyzico = PayWithIyzicoMapper::create($json)->jsonDecode()->mapPayWithIyzico(new PayWithIyzico());

        $this->assertNotEmpty($payWithIyzico);
        $this->assertEquals(Status::FAILURE, $payWithIyzico->getStatus());
        $this->assertEquals("10000", $payWithIyzico->getErrorCode());
        $this->assertEquals("error message", $payWithIyzico->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $payWithIyzico->getErrorGroup());
        $this->assertEquals(Locale::TR, $payWithIyzico->getLocale());
        $this->assertEquals("1458545234852", $payWithIyzico->getSystemTime());
        $this->assertEquals("123456", $payWithIyzico->getConversationId());
        $this->assertJson($payWithIyzico->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $payWithIyzico->getRawResult());
        $this->assertEquals("1.0", $payWithIyzico->getPrice());
        $this->assertEquals("1.1", $payWithIyzico->getPaidPrice());
        $this->assertEquals("1", $payWithIyzico->getInstallment());
        $this->assertEquals("1", $payWithIyzico->getPaymentId());
        $this->assertEmpty($payWithIyzico->getPaymentStatus());
        $this->assertEquals("1", $payWithIyzico->getFraudStatus());
        $this->assertEquals("10.00000000", $payWithIyzico->getMerchantCommissionRate());
        $this->assertEquals("0.1", $payWithIyzico->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $payWithIyzico->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $payWithIyzico->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $payWithIyzico->getCardType());
        $this->assertEquals("MASTER_CARD", $payWithIyzico->getCardAssociation());
        $this->assertEquals("Bonus", $payWithIyzico->getCardFamily());
        $this->assertEquals("cardUserKey", $payWithIyzico->getCardUserKey());
        $this->assertEquals("cardToken", $payWithIyzico->getCardToken());
        $this->assertEquals("554960", $payWithIyzico->getBinNumber());
        $this->assertEquals("B67832", $payWithIyzico->getBasketId());
        $this->assertEquals(Currency::TL, $payWithIyzico->getCurrency());
        $this->assertEquals("connector name", $payWithIyzico->getConnectorName());
        $this->assertEquals("auth code", $payWithIyzico->getAuthCode());
        $this->assertEquals("AUTH", $payWithIyzico->getPhase());
        $this->assertEquals("0000", $payWithIyzico->getLastFourDigits());
        $this->assertEquals("posOrderId", $payWithIyzico->getPosOrderId());

        $paymentItems = $payWithIyzico->getPaymentItems();
        $this->assertNotEmpty($payWithIyzico->getPaymentItems());
        $this->assertEquals(3, count($payWithIyzico->getPaymentItems()));

        $paymentItem = $paymentItems[0];
        $this->assertEquals("BI101", $paymentItem->getItemId());
        $this->assertEquals("4977", $paymentItem->getPaymentTransactionId());
        $this->assertEquals("2", $paymentItem->getTransactionStatus());
        $this->assertEquals("0.3", $paymentItem->getPrice());
        $this->assertEquals("0.33000000", $paymentItem->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentItem->getMerchantCommissionRate());
        $this->assertEquals("0.03000000", $paymentItem->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00973500", $paymentItem->getIyziCommissionRateAmount());
        $this->assertEquals("0.08850000", $paymentItem->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentItem->getBlockageRate());
        $this->assertEquals("0.03300000", $paymentItem->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentItem->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentItem->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentItem->getSubMerchantKey());
        $this->assertEquals("0", $paymentItem->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentItem->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentItem->getSubMerchantPayoutAmount());
        $this->assertEquals("0.19876500", $paymentItem->getMerchantPayoutAmount());
        $this->assertNotEmpty($paymentItem->getConvertedPayout());
        $this->assertEquals("0.33000000", $paymentItem->getConvertedPayout()->getPaidPrice());
        $this->assertEquals("0.00973500", $paymentItem->getConvertedPayout()->getIyziCommissionRateAmount());
        $this->assertEquals("0.08850000", $paymentItem->getConvertedPayout()->getIyziCommissionFee());
        $this->assertEquals("0.03300000", $paymentItem->getConvertedPayout()->getBlockageRateAmountMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getBlockageRateAmountSubMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getSubMerchantPayoutAmount());
        $this->assertEquals("0.19876500", $paymentItem->getConvertedPayout()->getMerchantPayoutAmount());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRate());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRateAmount());
        $this->assertEquals(Currency::TL, $paymentItem->getConvertedPayout()->getCurrency());

        $paymentItem = $paymentItems[1];
        $this->assertEquals("BI102", $paymentItem->getItemId());
        $this->assertEquals("4978", $paymentItem->getPaymentTransactionId());
        $this->assertEquals("2", $paymentItem->getTransactionStatus());
        $this->assertEquals("0.5", $paymentItem->getPrice());
        $this->assertEquals("0.55000000", $paymentItem->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentItem->getMerchantCommissionRate());
        $this->assertEquals("0.05000000", $paymentItem->getMerchantCommissionRateAmount());
        $this->assertEquals("0.01622500", $paymentItem->getIyziCommissionRateAmount());
        $this->assertEquals("0.14750000", $paymentItem->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentItem->getBlockageRate());
        $this->assertEquals("0.05500000", $paymentItem->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentItem->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentItem->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentItem->getSubMerchantKey());
        $this->assertEquals("0", $paymentItem->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentItem->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentItem->getSubMerchantPayoutAmount());
        $this->assertEquals("0.33127500", $paymentItem->getMerchantPayoutAmount());
        $this->assertNotEmpty($paymentItem->getConvertedPayout());
        $this->assertEquals("0.55000000", $paymentItem->getConvertedPayout()->getPaidPrice());
        $this->assertEquals("0.01622500", $paymentItem->getConvertedPayout()->getIyziCommissionRateAmount());
        $this->assertEquals("0.14750000", $paymentItem->getConvertedPayout()->getIyziCommissionFee());
        $this->assertEquals("0.05500000", $paymentItem->getConvertedPayout()->getBlockageRateAmountMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getBlockageRateAmountSubMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getSubMerchantPayoutAmount());
        $this->assertEquals("0.33127500", $paymentItem->getConvertedPayout()->getMerchantPayoutAmount());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRate());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRateAmount());
        $this->assertEquals(Currency::TL, $paymentItem->getConvertedPayout()->getCurrency());

        $paymentItem = $paymentItems[2];
        $this->assertEquals("BI103", $paymentItem->getItemId());
        $this->assertEquals("4979", $paymentItem->getPaymentTransactionId());
        $this->assertEquals("2", $paymentItem->getTransactionStatus());
        $this->assertEquals("0.2", $paymentItem->getPrice());
        $this->assertEquals("0.22000000", $paymentItem->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentItem->getMerchantCommissionRate());
        $this->assertEquals("0.02000000", $paymentItem->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00649000", $paymentItem->getIyziCommissionRateAmount());
        $this->assertEquals("0.05900000", $paymentItem->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentItem->getBlockageRate());
        $this->assertEquals("0.02200000", $paymentItem->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentItem->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentItem->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentItem->getSubMerchantKey());
        $this->assertEquals("0", $paymentItem->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentItem->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentItem->getSubMerchantPayoutAmount());
        $this->assertEquals("0.13251000", $paymentItem->getMerchantPayoutAmount());
        $this->assertNotEmpty($paymentItem->getConvertedPayout());
        $this->assertEquals("0.22000000", $paymentItem->getConvertedPayout()->getPaidPrice());
        $this->assertEquals("0.00649000", $paymentItem->getConvertedPayout()->getIyziCommissionRateAmount());
        $this->assertEquals("0.05900000", $paymentItem->getConvertedPayout()->getIyziCommissionFee());
        $this->assertEquals("0.02200000", $paymentItem->getConvertedPayout()->getBlockageRateAmountMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getBlockageRateAmountSubMerchant());
        $this->assertEquals("0E-8", $paymentItem->getConvertedPayout()->getSubMerchantPayoutAmount());
        $this->assertEquals("0.13251000", $paymentItem->getConvertedPayout()->getMerchantPayoutAmount());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRate());
        $this->assertEquals("0", $paymentItem->getConvertedPayout()->getIyziConversionRateAmount());
        $this->assertEquals(Currency::TL, $paymentItem->getConvertedPayout()->getCurrency());

        $this->assertEquals("token", $payWithIyzico->getToken());
        $this->assertEquals("url", $payWithIyzico->getCallbackUrl());
    }
}
