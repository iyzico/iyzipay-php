<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Currency;
use Iyzipay\Model\IyziupForm;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\IyziupFormMapper;
use Iyzipay\Tests\TestCase;

class IyziupFormMapperTest extends TestCase
{
    public function test_should_map_iyziup_form()
    {
        $json = $this->retrieveJsonFile("retrieve-iyziup-form.json");

        $iyziupForm = IyziupFormMapper::create($json)->jsonDecode()->mapIyziupForm(new IyziupForm());

        $this->assertNotEmpty($iyziupForm);
        $this->assertEquals("failure", $iyziupForm->getStatus());
        $this->assertEquals("10000", $iyziupForm->getErrorCode());
        $this->assertEquals("error message", $iyziupForm->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $iyziupForm->getErrorGroup());
        $this->assertEquals(Locale::TR, $iyziupForm->getLocale());
        $this->assertEquals("1458545234852", $iyziupForm->getSystemTime());
        $this->assertEquals("123456", $iyziupForm->getConversationId());
        $this->assertJson($iyziupForm->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziupForm->getRawResult());

        $this->assertEquals("payment_completed", $iyziupForm->getOrderResponseStatus());
        $this->assertEquals("token", $iyziupForm->getToken());
        $this->assertEquals("www.callback.uri", $iyziupForm->getCallbackUrl());

        $consumer = $iyziupForm->getConsumer();
        $this->assertEquals("Jane", $consumer->getName());
        $this->assertEquals("Doe", $consumer->getSurName());
        $this->assertEquals("consumer@mail.com", $consumer->getEmail());
        $this->assertEquals("+905490000000", $consumer->getGsmNumber());
        $this->assertEquals("11111", $consumer->getIdentityNumber());

        $shippingAddress = $iyziupForm->getShippingAddress();
        $this->assertEquals("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı", $shippingAddress->getAddress());
        $this->assertEquals("34742", $shippingAddress->getZipCode());
        $this->assertEquals("John Doe", $shippingAddress->getContactName());
        $this->assertEquals("İstanbul", $shippingAddress->getCity());
        $this->assertEquals("Türkiye", $shippingAddress->getCountry());

        $billingAddress = $iyziupForm->getBillingAddress();
        $this->assertEquals("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı", $billingAddress->getAddress());
        $this->assertEquals("34742", $billingAddress->getZipCode());
        $this->assertEquals("John Doe", $billingAddress->getContactName());
        $this->assertEquals("İstanbul", $billingAddress->getCity());
        $this->assertEquals("Türkiye", $billingAddress->getCountry());

        $paymentDetail = $iyziupForm->getPaymentDetail();

        $this->assertEquals("1.0", $paymentDetail->getPrice());
        $this->assertEquals("1.1", $paymentDetail->getPaidPrice());
        $this->assertEquals("1", $paymentDetail->getInstallment());
        $this->assertEquals("1", $paymentDetail->getPaymentId());
        $this->assertEquals("failure", $paymentDetail->getPaymentStatus());
        $this->assertEquals("1", $paymentDetail->getFraudStatus());
        $this->assertEquals("10.00000000", $paymentDetail->getMerchantCommissionRate());
        $this->assertEquals("0.1", $paymentDetail->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $paymentDetail->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $paymentDetail->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $paymentDetail->getCardType());
        $this->assertEquals("MASTER_CARD", $paymentDetail->getCardAssociation());
        $this->assertEquals("Bonus", $paymentDetail->getCardFamily());
        $this->assertEquals("cardUserKey", $paymentDetail->getCardUserKey());
        $this->assertEquals("cardToken", $paymentDetail->getCardToken());
        $this->assertEquals("554960", $paymentDetail->getBinNumber());
        $this->assertEquals("B67832", $paymentDetail->getBasketId());
        $this->assertEquals(Currency::TL, $paymentDetail->getCurrency());
        $this->assertEquals("connector name", $paymentDetail->getConnectorName());
        $this->assertEquals("auth code", $paymentDetail->getAuthCode());
        $this->assertEquals("AUTH", $paymentDetail->getPhase());
        $this->assertEquals("0000", $paymentDetail->getLastFourDigits());

        $paymentItems = $paymentDetail->getPaymentItems();
        $this->assertNotEmpty($paymentDetail->getPaymentItems());
        $this->assertEquals(3, count($paymentDetail->getPaymentItems()));

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
