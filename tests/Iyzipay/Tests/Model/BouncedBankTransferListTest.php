<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BouncedBankTransferList;
use Iyzipay\Request\RetrieveTransactionsRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BouncedBankTransferListTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_bounced_bank_transfer_list()
    {
        $this->expectHttpPost();

        $bouncedBankTransferList = BouncedBankTransferList::retrieve(new RetrieveTransactionsRequest(), $this->options);

        $this->verifyResource($bouncedBankTransferList);
    }
}