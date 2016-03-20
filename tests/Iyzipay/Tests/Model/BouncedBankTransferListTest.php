<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\BouncedBankTransferList;
use Iyzipay\Request\RetrieveTransactionsRequest;

class BouncedBankTransferListTest extends IyzipayResourceTestCase
{
    public function test_should_get_bounced_bank_transfer_list()
    {
        $this->expectHttpPost();

        $bouncedBankTransferList = BouncedBankTransferList::retrieve(new RetrieveTransactionsRequest(), $this->options);

        $this->verifyResource($bouncedBankTransferList);
    }
}