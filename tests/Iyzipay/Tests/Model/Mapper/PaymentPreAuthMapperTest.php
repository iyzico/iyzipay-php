<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PaymentPreAuthMapper;
use Iyzipay\Model\PaymentPreAuth;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PaymentPreAuthMapperTest extends TestCase
{
    public function test_should_map_payment_pre_auth()
    {
        $json = $this->retrieveJsonFile("create-payment.json");

        $paymentPreAuth = PaymentPreAuthMapper::create($json)->jsonDecode()->mapPaymentPreAuth(new PaymentPreAuth());

        $this->assertNotEmpty($paymentPreAuth);
        $this->assertEquals(Status::FAILURE, $paymentPreAuth->getStatus());
        $this->assertEquals("10000", $paymentPreAuth->getErrorCode());
        $this->assertEquals("error message", $paymentPreAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $paymentPreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $paymentPreAuth->getLocale());
        $this->assertEquals("1458545234852", $paymentPreAuth->getSystemTime());
        $this->assertEquals("123456", $paymentPreAuth->getConversationId());
        $this->assertJson($paymentPreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $paymentPreAuth->getRawResult());
        $this->assertEquals("1.0", $paymentPreAuth->getPrice());
        $this->assertEquals("1.1", $paymentPreAuth->getPaidPrice());
        $this->assertEquals("1", $paymentPreAuth->getInstallment());
        $this->assertEquals("1", $paymentPreAuth->getPaymentId());
        $this->assertEquals("SUCCESS", $paymentPreAuth->getPaymentStatus());
        $this->assertEquals("1", $paymentPreAuth->getFraudStatus());
        $this->assertEquals("10.00000000", $paymentPreAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $paymentPreAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $paymentPreAuth->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $paymentPreAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $paymentPreAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $paymentPreAuth->getCardAssociation());
        $this->assertEquals("Bonus", $paymentPreAuth->getCardFamily());
        $this->assertEquals("cardUserKey", $paymentPreAuth->getCardUserKey());
        $this->assertEquals("cardToken", $paymentPreAuth->getCardToken());
        $this->assertEquals("554960", $paymentPreAuth->getBinNumber());
        $this->assertEquals("B67832", $paymentPreAuth->getBasketId());
        $this->assertEquals(Currency::TL, $paymentPreAuth->getCurrency());
        $this->assertEquals("connector name", $paymentPreAuth->getConnectorName());
        $this->assertEquals("auth code", $paymentPreAuth->getAuthCode());
        $this->assertEquals("AUTH", $paymentPreAuth->getPhase());
        $this->assertEquals("0000", $paymentPreAuth->getLastFourDigits());
        $this->assertEquals("posOrderId", $paymentPreAuth->getPosOrderId());

        $paymentItems = $paymentPreAuth->getPaymentItems();
        $this->assertNotEmpty($paymentPreAuth->getPaymentItems());
        $this->assertEquals(3, count($paymentPreAuth->getPaymentItems()));

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
    }
}
