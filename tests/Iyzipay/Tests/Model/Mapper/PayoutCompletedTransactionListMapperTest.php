<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PayoutCompletedTransactionListMapper;
use Iyzipay\Model\PayoutCompletedTransactionList;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PayoutCompletedTransactionListMapperTest extends TestCase
{
    public function test_should_map_payout_completed_transaction_list()
    {
        $json = $this->retrieveJsonFile("retrieve-payout-completed-transactions.json");

        $payoutCompletedTransactionList = PayoutCompletedTransactionListMapper::create($json)->jsonDecode()->mapPayoutCompletedTransactionList(new PayoutCompletedTransactionList());

        $this->assertNotEmpty($payoutCompletedTransactionList);
        $this->assertEquals(Status::FAILURE, $payoutCompletedTransactionList->getStatus());
        $this->assertEquals("10000", $payoutCompletedTransactionList->getErrorCode());
        $this->assertEquals("error message", $payoutCompletedTransactionList->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $payoutCompletedTransactionList->getErrorGroup());
        $this->assertEquals(Locale::TR, $payoutCompletedTransactionList->getLocale());
        $this->assertEquals("1458545234852", $payoutCompletedTransactionList->getSystemTime());
        $this->assertEquals("123456", $payoutCompletedTransactionList->getConversationId());
        $this->assertJson($payoutCompletedTransactionList->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $payoutCompletedTransactionList->getRawResult());

        $payoutCompletedTransactions = $payoutCompletedTransactionList->getPayoutCompletedTransactions();
        $this->assertNotEmpty($payoutCompletedTransactions);
        $this->assertEquals(2, count($payoutCompletedTransactions));

        $payoutCompletedTransaction1 = $payoutCompletedTransactions[0];
        $this->assertEquals("12345", $payoutCompletedTransaction1->getPaymentTransactionId());
        $this->assertEquals("100.0", $payoutCompletedTransaction1->getPayoutAmount());
        $this->assertEquals("MERCHANT_PAYOUT", $payoutCompletedTransaction1->getPayoutType());
        $this->assertEquals("subMerchantKey", $payoutCompletedTransaction1->getSubMerchantKey());
        $this->assertEquals(Currency::TL, $payoutCompletedTransaction1->getCurrency());

        $payoutCompletedTransaction2 = $payoutCompletedTransactions[1];
        $this->assertEquals("12345", $payoutCompletedTransaction2->getPaymentTransactionId());
        $this->assertEquals("105.0", $payoutCompletedTransaction2->getPayoutAmount());
        $this->assertEquals("MERCHANT_PAYOUT", $payoutCompletedTransaction2->getPayoutType());
        $this->assertEquals("subMerchantKey", $payoutCompletedTransaction2->getSubMerchantKey());
        $this->assertEquals(Currency::TL, $payoutCompletedTransaction2->getCurrency());
    }
}