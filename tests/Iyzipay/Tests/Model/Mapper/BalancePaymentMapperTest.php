<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BalancePayment;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BalancePaymentMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BalancePaymentMapperTest extends TestCase
{
    public function test_should_map_balance_payment()
    {
        $json = $this->retrieveJsonFile("retrieve-balance-payment.json");

        $balancePayment = BalancePaymentMapper::create($json)->jsonDecode()->mapBalancePayment(new BalancePayment());

        $this->assertNotEmpty($balancePayment);
        $this->assertEquals(Status::FAILURE, $balancePayment->getStatus());
        $this->assertEquals("10000", $balancePayment->getErrorCode());
        $this->assertEquals("error message", $balancePayment->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $balancePayment->getErrorGroup());
        $this->assertEquals(Locale::TR, $balancePayment->getLocale());
        $this->assertEquals("1458545234852", $balancePayment->getSystemTime());
        $this->assertEquals("123456", $balancePayment->getConversationId());
        $this->assertJson($balancePayment->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $balancePayment->getRawResult());
        $this->assertEquals("1.0", $balancePayment->getPrice());
        $this->assertEquals("1.1", $balancePayment->getPaidPrice());
        $this->assertEquals("1", $balancePayment->getInstallment());
        $this->assertEquals("1", $balancePayment->getPaymentId());
        $this->assertEmpty($balancePayment->getPaymentStatus());
        $this->assertEquals("1", $balancePayment->getFraudStatus());
        $this->assertEquals("10.00000000", $balancePayment->getMerchantCommissionRate());
        $this->assertEquals("0.1", $balancePayment->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $balancePayment->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $balancePayment->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $balancePayment->getCardType());
        $this->assertEquals("MASTER_CARD", $balancePayment->getCardAssociation());
        $this->assertEquals("Bonus", $balancePayment->getCardFamily());
        $this->assertEquals("cardUserKey", $balancePayment->getCardUserKey());
        $this->assertEquals("cardToken", $balancePayment->getCardToken());
        $this->assertEquals("554960", $balancePayment->getBinNumber());
        $this->assertEquals("B67832", $balancePayment->getBasketId());
        $this->assertEquals(Currency::TL, $balancePayment->getCurrency());
        $this->assertEquals("connector name", $balancePayment->getConnectorName());
        $this->assertEquals("auth code", $balancePayment->getAuthCode());
        $this->assertEquals("AUTH", $balancePayment->getPhase());
        $this->assertEquals("0000", $balancePayment->getLastFourDigits());
        $this->assertEquals("posOrderId", $balancePayment->getPosOrderId());

        $paymentItems = $balancePayment->getPaymentItems();
        $this->assertNotEmpty($balancePayment->getPaymentItems());
        $this->assertEquals(3, count($balancePayment->getPaymentItems()));

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

        $this->assertEquals("token", $balancePayment->getToken());
        $this->assertEquals("url", $balancePayment->getCallbackUrl());
    }
}
