<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CheckoutFormAuth;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CheckoutFormAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CheckoutFormAuthMapperTest extends TestCase
{
    public function test_should_map_bkm_auth()
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
                "token": "token",
                "callbackUrl": "https://www.iyzico.com",
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

        $checkoutFormAuth = CheckoutFormAuthMapper::create($json)->jsonDecode()->mapCheckoutFormAuth(new CheckoutFormAuth());

        $this->assertNotEmpty($checkoutFormAuth);
        $this->assertEquals(Status::FAILURE, $checkoutFormAuth->getStatus());
        $this->assertEquals("10000", $checkoutFormAuth->getErrorCode());
        $this->assertEquals("error message", $checkoutFormAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $checkoutFormAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $checkoutFormAuth->getLocale());
        $this->assertEquals("1458545234852", $checkoutFormAuth->getSystemTime());
        $this->assertEquals("123456", $checkoutFormAuth->getConversationId());
        $this->assertJson($checkoutFormAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $checkoutFormAuth->getRawResult());
        $this->assertEquals("1.0", $checkoutFormAuth->getPrice());
        $this->assertEquals("1.1", $checkoutFormAuth->getPaidPrice());
        $this->assertEquals("1", $checkoutFormAuth->getPaymentId());
        $this->assertEquals("1", $checkoutFormAuth->getInstallment());
        $this->assertEquals("1", $checkoutFormAuth->getPaymentId());
        $this->assertEmpty($checkoutFormAuth->getPaymentStatus());
        $this->assertEquals("1", $checkoutFormAuth->getFraudStatus());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getMerchantCommissionRate());
        $this->assertEquals("0.1", $checkoutFormAuth->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $checkoutFormAuth->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $checkoutFormAuth->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $checkoutFormAuth->getCardType());
        $this->assertEquals("MASTER_CARD", $checkoutFormAuth->getCardAssociation());
        $this->assertEquals("Bonus", $checkoutFormAuth->getCardFamily());
        $this->assertEquals("cardUserKey", $checkoutFormAuth->getCardUserKey());
        $this->assertEquals("cardToken", $checkoutFormAuth->getCardToken());
        $this->assertEquals("554960", $checkoutFormAuth->getBinNumber());
        $this->assertEquals("B67832", $checkoutFormAuth->getBasketId());
        $this->assertEquals("token", $checkoutFormAuth->getToken());
        $this->assertEquals("https://www.iyzico.com", $checkoutFormAuth->getCallbackUrl());
        $this->assertNotEmpty($checkoutFormAuth->getPaymentItems());
        $this->assertEquals(3, count($checkoutFormAuth->getPaymentItems()));

        $this->assertEquals("BI101", $checkoutFormAuth->getPaymentItems()[0]->getItemId());
        $this->assertEquals("4977", $checkoutFormAuth->getPaymentItems()[0]->getPaymentTransactionId());
        $this->assertEquals("2", $checkoutFormAuth->getPaymentItems()[0]->getTransactionStatus());
        $this->assertEquals("0.3", $checkoutFormAuth->getPaymentItems()[0]->getPrice());
        $this->assertEquals("0.33000000", $checkoutFormAuth->getPaymentItems()[0]->getPaidPrice());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[0]->getMerchantCommissionRate());
        $this->assertEquals("0.03000000", $checkoutFormAuth->getPaymentItems()[0]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00973500", $checkoutFormAuth->getPaymentItems()[0]->getIyziCommissionRateAmount());
        $this->assertEquals("0.08850000", $checkoutFormAuth->getPaymentItems()[0]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[0]->getBlockageRate());
        $this->assertEquals("0.03300000", $checkoutFormAuth->getPaymentItems()[0]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[0]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $checkoutFormAuth->getPaymentItems()[0]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $checkoutFormAuth->getPaymentItems()[0]->getSubMerchantKey());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[0]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $checkoutFormAuth->getPaymentItems()[0]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[0]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.19876500", $checkoutFormAuth->getPaymentItems()[0]->getMerchantPayoutAmount());

        $this->assertEquals("BI102", $checkoutFormAuth->getPaymentItems()[1]->getItemId());
        $this->assertEquals("4978", $checkoutFormAuth->getPaymentItems()[1]->getPaymentTransactionId());
        $this->assertEquals("2", $checkoutFormAuth->getPaymentItems()[1]->getTransactionStatus());
        $this->assertEquals("0.5", $checkoutFormAuth->getPaymentItems()[1]->getPrice());
        $this->assertEquals("0.55000000", $checkoutFormAuth->getPaymentItems()[1]->getPaidPrice());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[1]->getMerchantCommissionRate());
        $this->assertEquals("0.05000000", $checkoutFormAuth->getPaymentItems()[1]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.01622500", $checkoutFormAuth->getPaymentItems()[1]->getIyziCommissionRateAmount());
        $this->assertEquals("0.14750000", $checkoutFormAuth->getPaymentItems()[1]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[1]->getBlockageRate());
        $this->assertEquals("0.05500000", $checkoutFormAuth->getPaymentItems()[1]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[1]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $checkoutFormAuth->getPaymentItems()[1]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $checkoutFormAuth->getPaymentItems()[1]->getSubMerchantKey());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[1]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $checkoutFormAuth->getPaymentItems()[1]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[1]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.33127500", $checkoutFormAuth->getPaymentItems()[1]->getMerchantPayoutAmount());

        $this->assertEquals("BI103", $checkoutFormAuth->getPaymentItems()[2]->getItemId());
        $this->assertEquals("4979", $checkoutFormAuth->getPaymentItems()[2]->getPaymentTransactionId());
        $this->assertEquals("2", $checkoutFormAuth->getPaymentItems()[2]->getTransactionStatus());
        $this->assertEquals("0.2", $checkoutFormAuth->getPaymentItems()[2]->getPrice());
        $this->assertEquals("0.22000000", $checkoutFormAuth->getPaymentItems()[2]->getPaidPrice());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[2]->getMerchantCommissionRate());
        $this->assertEquals("0.02000000", $checkoutFormAuth->getPaymentItems()[2]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00649000", $checkoutFormAuth->getPaymentItems()[2]->getIyziCommissionRateAmount());
        $this->assertEquals("0.05900000", $checkoutFormAuth->getPaymentItems()[2]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $checkoutFormAuth->getPaymentItems()[2]->getBlockageRate());
        $this->assertEquals("0.02200000", $checkoutFormAuth->getPaymentItems()[2]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[2]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $checkoutFormAuth->getPaymentItems()[2]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $checkoutFormAuth->getPaymentItems()[2]->getSubMerchantKey());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[2]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $checkoutFormAuth->getPaymentItems()[2]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $checkoutFormAuth->getPaymentItems()[2]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.13251000", $checkoutFormAuth->getPaymentItems()[2]->getMerchantPayoutAmount());
    }
}
