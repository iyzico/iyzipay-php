<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PaymentAuthMapper;
use Iyzipay\Model\PaymentAuth;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PaymentAuthMapperTest extends TestCase
{
    public function test_should_map_payment_auth()
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

        $paymentAuth = PaymentAuthMapper::create($json)->jsonDecode()->mapPaymentAuth(new PaymentAuth());

        $this->assertNotEmpty($paymentAuth);
        $this->assertEquals(Status::FAILURE, $paymentAuth->getStatus());
        $this->assertEquals("10000", $paymentAuth->getErrorCode());
        $this->assertEquals("error message", $paymentAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $paymentAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $paymentAuth->getLocale());
        $this->assertEquals("1458545234852", $paymentAuth->getSystemTime());
        $this->assertEquals("123456", $paymentAuth->getConversationId());
        $this->assertJson($paymentAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $paymentAuth->getRawResult());
        $this->assertEquals("1.0", $paymentAuth->getPrice());
        $this->assertEquals("1.1", $paymentAuth->getPaidPrice());
        $this->assertEquals("1", $paymentAuth->getPaymentId());
        $this->assertEquals("1", $paymentAuth->getInstallment());
        $this->assertEquals("1", $paymentAuth->getPaymentId());
        $this->assertEmpty($paymentAuth->getPaymentStatus());
        $this->assertEquals("1", $paymentAuth->getFraudStatus());
        $this->assertEquals("10.00000000", $paymentAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $paymentAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $paymentAuth->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $paymentAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $paymentAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $paymentAuth->getCardAssociation());
        $this->assertEquals("Bonus", $paymentAuth->getCardFamily());
        $this->assertEquals("cardUserKey", $paymentAuth->getCardUserKey());
        $this->assertEquals("cardToken", $paymentAuth->getCardToken());
        $this->assertEquals("554960", $paymentAuth->getBinNumber());
        $this->assertEquals("B67832", $paymentAuth->getBasketId());
        $this->assertNotEmpty($paymentAuth->getPaymentItems());
        $this->assertEquals(3, count($paymentAuth->getPaymentItems()));

        $this->assertEquals("BI101", $paymentAuth->getPaymentItems()[0]->getItemId());
        $this->assertEquals("4977", $paymentAuth->getPaymentItems()[0]->getPaymentTransactionId());
        $this->assertEquals("2", $paymentAuth->getPaymentItems()[0]->getTransactionStatus());
        $this->assertEquals("0.3", $paymentAuth->getPaymentItems()[0]->getPrice());
        $this->assertEquals("0.33000000", $paymentAuth->getPaymentItems()[0]->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[0]->getMerchantCommissionRate());
        $this->assertEquals("0.03000000", $paymentAuth->getPaymentItems()[0]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00973500", $paymentAuth->getPaymentItems()[0]->getIyziCommissionRateAmount());
        $this->assertEquals("0.08850000", $paymentAuth->getPaymentItems()[0]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[0]->getBlockageRate());
        $this->assertEquals("0.03300000", $paymentAuth->getPaymentItems()[0]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[0]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentAuth->getPaymentItems()[0]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentAuth->getPaymentItems()[0]->getSubMerchantKey());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[0]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentAuth->getPaymentItems()[0]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[0]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.19876500", $paymentAuth->getPaymentItems()[0]->getMerchantPayoutAmount());

        $this->assertEquals("BI102", $paymentAuth->getPaymentItems()[1]->getItemId());
        $this->assertEquals("4978", $paymentAuth->getPaymentItems()[1]->getPaymentTransactionId());
        $this->assertEquals("2", $paymentAuth->getPaymentItems()[1]->getTransactionStatus());
        $this->assertEquals("0.5", $paymentAuth->getPaymentItems()[1]->getPrice());
        $this->assertEquals("0.55000000", $paymentAuth->getPaymentItems()[1]->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[1]->getMerchantCommissionRate());
        $this->assertEquals("0.05000000", $paymentAuth->getPaymentItems()[1]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.01622500", $paymentAuth->getPaymentItems()[1]->getIyziCommissionRateAmount());
        $this->assertEquals("0.14750000", $paymentAuth->getPaymentItems()[1]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[1]->getBlockageRate());
        $this->assertEquals("0.05500000", $paymentAuth->getPaymentItems()[1]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[1]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentAuth->getPaymentItems()[1]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentAuth->getPaymentItems()[1]->getSubMerchantKey());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[1]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentAuth->getPaymentItems()[1]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[1]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.33127500", $paymentAuth->getPaymentItems()[1]->getMerchantPayoutAmount());

        $this->assertEquals("BI103", $paymentAuth->getPaymentItems()[2]->getItemId());
        $this->assertEquals("4979", $paymentAuth->getPaymentItems()[2]->getPaymentTransactionId());
        $this->assertEquals("2", $paymentAuth->getPaymentItems()[2]->getTransactionStatus());
        $this->assertEquals("0.2", $paymentAuth->getPaymentItems()[2]->getPrice());
        $this->assertEquals("0.22000000", $paymentAuth->getPaymentItems()[2]->getPaidPrice());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[2]->getMerchantCommissionRate());
        $this->assertEquals("0.02000000", $paymentAuth->getPaymentItems()[2]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00649000", $paymentAuth->getPaymentItems()[2]->getIyziCommissionRateAmount());
        $this->assertEquals("0.05900000", $paymentAuth->getPaymentItems()[2]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $paymentAuth->getPaymentItems()[2]->getBlockageRate());
        $this->assertEquals("0.02200000", $paymentAuth->getPaymentItems()[2]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[2]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $paymentAuth->getPaymentItems()[2]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $paymentAuth->getPaymentItems()[2]->getSubMerchantKey());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[2]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $paymentAuth->getPaymentItems()[2]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $paymentAuth->getPaymentItems()[2]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.13251000", $paymentAuth->getPaymentItems()[2]->getMerchantPayoutAmount());
    }
}
