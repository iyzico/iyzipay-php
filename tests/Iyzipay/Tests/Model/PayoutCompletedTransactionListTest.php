<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\PayoutCompletedTransactionList;
use Iyzipay\Request\RetrieveTransactionsRequest;

class PayoutCompletedTransactionListTest extends IyzipayResourceTestCase
{
    public function test_should_get_payout_completed_bank_transfer_list()
    {
        $this->expectHttpPost();

        $payoutCompletedTransactionList = PayoutCompletedTransactionList::retrieve(new RetrieveTransactionsRequest(), $this->options);

        $this->verifyResource($payoutCompletedTransactionList);
    }
}