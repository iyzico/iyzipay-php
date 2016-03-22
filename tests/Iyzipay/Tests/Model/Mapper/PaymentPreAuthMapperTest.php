<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PaymentPreAuthMapper;
use Iyzipay\Model\PaymentPreAuth;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PaymentPreAuthMapperTest extends TestCase
{
    public function test_should_map_payment_pre_auth()
    {
        $json = '
            {
                "status": "failure",
                "errorCode":"10000",
                "errorMessage":"error message",
                "errorGroup":"ERROR_GROUP",
                "locale": "tr",
                "systemTime": 1458545234852,
                "conversationId": "123456",
                "price": 1.0,
                "paidPrice": 1.1,
                "installment": 1,
                "paymentId": "1",
                "paymentStatus": null,
                "fraudStatus": 1,
                "merchantCommissionRate": 10.00000000,
                "merchantCommissionRateAmount": 0.1,
                "iyziCommissionRateAmount": 0.03245000,
                "iyziCommissionFee": 0.29500000,
                "cardType": "CREDIT_CARD",
                "cardAssociation": "MASTER_CARD",
                "cardFamily": "Bonus",
                "cardUserKey": "cardUserKey",
                "cardToken": "cardToken",
                "binNumber": "554960",
                "basketId": "B67832",
                "itemTransactions": [
                {
                    "itemId": "BI101",
                    "paymentTransactionId": "4977",
                    "transactionStatus": 2,
                    "price": 0.3,
                    "paidPrice": 0.33000000,
                    "merchantCommissionRate": 10.00000000,
                    "merchantCommissionRateAmount": 0.03000000,
                    "iyziCommissionRateAmount": 0.00973500,
                    "iyziCommissionFee": 0.08850000,
                    "blockageRate": 10.00000000,
                    "blockageRateAmountMerchant": 0.03300000,
                    "blockageRateAmountSubMerchant": 0,
                    "blockageResolvedDate": "2016-03-28 09:27:14",
                    "subMerchantKey": "subMerchantKey",
                    "subMerchantPrice": 0,
                    "subMerchantPayoutRate": 0E-8,
                    "subMerchantPayoutAmount": 0,
                    "merchantPayoutAmount": 0.19876500
                },
                {
                    "itemId": "BI102",
                    "paymentTransactionId": "4978",
                    "transactionStatus": 2,
                    "price": 0.5,
                    "paidPrice": 0.55000000,
                    "merchantCommissionRate": 10.00000000,
                    "merchantCommissionRateAmount": 0.05000000,
                    "iyziCommissionRateAmount": 0.01622500,
                    "iyziCommissionFee": 0.14750000,
                    "blockageRate": 10.00000000,
                    "blockageRateAmountMerchant": 0.05500000,
                    "blockageRateAmountSubMerchant": 0,
                    "blockageResolvedDate": "2016-03-28 09:27:14",
                    "subMerchantKey": "subMerchantKey",
                    "subMerchantPrice": 0,
                    "subMerchantPayoutRate": 0E-8,
                    "subMerchantPayoutAmount": 0,
                    "merchantPayoutAmount": 0.33127500
                },
                {
                    "itemId": "BI103",
                    "paymentTransactionId": "4979",
                    "transactionStatus": 2,
                    "price": 0.2,
                    "paidPrice": 0.22000000,
                    "merchantCommissionRate": 10.00000000,
                    "merchantCommissionRateAmount": 0.02000000,
                    "iyziCommissionRateAmount": 0.00649000,
                    "iyziCommissionFee": 0.05900000,
                    "blockageRate": 10.00000000,
                    "blockageRateAmountMerchant": 0.02200000,
                    "blockageRateAmountSubMerchant": 0,
                    "blockageResolvedDate": "2016-03-28 09:27:14",
                    "subMerchantKey": "subMerchantKey",
                    "subMerchantPrice": 0,
                    "subMerchantPayoutRate": 0E-8,
                    "subMerchantPayoutAmount": 0,
                    "merchantPayoutAmount": 0.13251000
                }]
            }';

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
        $this->assertEquals("1", $paymentPreAuth->getPaymentId());
        $this->assertEquals("1", $paymentPreAuth->getInstallment());
        $this->assertEquals("1", $paymentPreAuth->getPaymentId());
        $this->assertEmpty($paymentPreAuth->getPaymentStatus());
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
    }
}
