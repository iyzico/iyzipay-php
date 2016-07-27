<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PayoutCompletedTransactionList;
use Iyzipay\Request\RetrieveTransactionsRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PayoutCompletedTransactionListTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_payout_completed_bank_transfer_list()
    {
        $this->expectHttpPost();

        $payoutCompletedTransactionList = PayoutCompletedTransactionList::retrieve(new RetrieveTransactionsRequest(), $this->options);

        $this->verifyResource($payoutCompletedTransactionList);
    }
}