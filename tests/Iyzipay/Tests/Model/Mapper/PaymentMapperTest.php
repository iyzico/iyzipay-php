<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PaymentMapper;
use Iyzipay\Model\Payment;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PaymentMapperTest extends TestCase
{
    public function test_should_map_payment()
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

        $payment = PaymentMapper::create($json)->jsonDecode()->mapPayment(new Payment());

        $this->assertNotEmpty($payment);
        $this->assertEquals(Status::FAILURE, $payment->getStatus());
        $this->assertEquals("10000", $payment->getErrorCode());
        $this->assertEquals("error message", $payment->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $payment->getErrorGroup());
        $this->assertEquals(Locale::TR, $payment->getLocale());
        $this->assertEquals("1458545234852", $payment->getSystemTime());
        $this->assertEquals("123456", $payment->getConversationId());
        $this->assertJson($payment->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $payment->getRawResult());
        $this->assertEquals("1.0", $payment->getPrice());
        $this->assertEquals("1.1", $payment->getPaidPrice());
        $this->assertEquals("1", $payment->getPaymentId());
        $this->assertEquals("1", $payment->getInstallment());
        $this->assertEquals("1", $payment->getPaymentId());
        $this->assertEmpty($payment->getPaymentStatus());
        $this->assertEquals("1", $payment->getFraudStatus());
        $this->assertEquals("10.00000000", $payment->getMerchantCommissionRate());
        $this->assertEquals("0.1", $payment->getMerchantCommissionRateAmount());
        $this->assertEquals("0.03245000", $payment->getIyziCommissionRateAmount());
        $this->assertEquals("0.29500000", $payment->getIyziCommissionFee());
        $this->assertEquals("CREDIT_CARD", $payment->getCardType());
        $this->assertEquals("MASTER_CARD", $payment->getCardAssociation());
        $this->assertEquals("Bonus", $payment->getCardFamily());
        $this->assertEquals("cardUserKey", $payment->getCardUserKey());
        $this->assertEquals("cardToken", $payment->getCardToken());
        $this->assertEquals("554960", $payment->getBinNumber());
        $this->assertEquals("B67832", $payment->getBasketId());
        $this->assertNotEmpty($payment->getPaymentItems());
        $this->assertEquals(3, count($payment->getPaymentItems()));

        $this->assertEquals("BI101", $payment->getPaymentItems()[0]->getItemId());
        $this->assertEquals("4977", $payment->getPaymentItems()[0]->getPaymentTransactionId());
        $this->assertEquals("2", $payment->getPaymentItems()[0]->getTransactionStatus());
        $this->assertEquals("0.3", $payment->getPaymentItems()[0]->getPrice());
        $this->assertEquals("0.33000000", $payment->getPaymentItems()[0]->getPaidPrice());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[0]->getMerchantCommissionRate());
        $this->assertEquals("0.03000000", $payment->getPaymentItems()[0]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00973500", $payment->getPaymentItems()[0]->getIyziCommissionRateAmount());
        $this->assertEquals("0.08850000", $payment->getPaymentItems()[0]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[0]->getBlockageRate());
        $this->assertEquals("0.03300000", $payment->getPaymentItems()[0]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $payment->getPaymentItems()[0]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $payment->getPaymentItems()[0]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $payment->getPaymentItems()[0]->getSubMerchantKey());
        $this->assertEquals("0", $payment->getPaymentItems()[0]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $payment->getPaymentItems()[0]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $payment->getPaymentItems()[0]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.19876500", $payment->getPaymentItems()[0]->getMerchantPayoutAmount());

        $this->assertEquals("BI102", $payment->getPaymentItems()[1]->getItemId());
        $this->assertEquals("4978", $payment->getPaymentItems()[1]->getPaymentTransactionId());
        $this->assertEquals("2", $payment->getPaymentItems()[1]->getTransactionStatus());
        $this->assertEquals("0.5", $payment->getPaymentItems()[1]->getPrice());
        $this->assertEquals("0.55000000", $payment->getPaymentItems()[1]->getPaidPrice());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[1]->getMerchantCommissionRate());
        $this->assertEquals("0.05000000", $payment->getPaymentItems()[1]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.01622500", $payment->getPaymentItems()[1]->getIyziCommissionRateAmount());
        $this->assertEquals("0.14750000", $payment->getPaymentItems()[1]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[1]->getBlockageRate());
        $this->assertEquals("0.05500000", $payment->getPaymentItems()[1]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $payment->getPaymentItems()[1]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $payment->getPaymentItems()[1]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $payment->getPaymentItems()[1]->getSubMerchantKey());
        $this->assertEquals("0", $payment->getPaymentItems()[1]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $payment->getPaymentItems()[1]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $payment->getPaymentItems()[1]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.33127500", $payment->getPaymentItems()[1]->getMerchantPayoutAmount());

        $this->assertEquals("BI103", $payment->getPaymentItems()[2]->getItemId());
        $this->assertEquals("4979", $payment->getPaymentItems()[2]->getPaymentTransactionId());
        $this->assertEquals("2", $payment->getPaymentItems()[2]->getTransactionStatus());
        $this->assertEquals("0.2", $payment->getPaymentItems()[2]->getPrice());
        $this->assertEquals("0.22000000", $payment->getPaymentItems()[2]->getPaidPrice());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[2]->getMerchantCommissionRate());
        $this->assertEquals("0.02000000", $payment->getPaymentItems()[2]->getMerchantCommissionRateAmount());
        $this->assertEquals("0.00649000", $payment->getPaymentItems()[2]->getIyziCommissionRateAmount());
        $this->assertEquals("0.05900000", $payment->getPaymentItems()[2]->getIyziCommissionFee());
        $this->assertEquals("10.00000000", $payment->getPaymentItems()[2]->getBlockageRate());
        $this->assertEquals("0.02200000", $payment->getPaymentItems()[2]->getBlockageRateAmountMerchant());
        $this->assertEquals("0", $payment->getPaymentItems()[2]->getBlockageRateAmountSubMerchant());
        $this->assertEquals("2016-03-28 09:27:14", $payment->getPaymentItems()[2]->getBlockageResolvedDate());
        $this->assertEquals("subMerchantKey", $payment->getPaymentItems()[2]->getSubMerchantKey());
        $this->assertEquals("0", $payment->getPaymentItems()[2]->getSubMerchantPrice());
        $this->assertEquals("0E-8", $payment->getPaymentItems()[2]->getSubMerchantPayoutRate());
        $this->assertEquals("0", $payment->getPaymentItems()[2]->getSubMerchantPayoutAmount());
        $this->assertEquals("0.13251000", $payment->getPaymentItems()[2]->getMerchantPayoutAmount());
    }
}
