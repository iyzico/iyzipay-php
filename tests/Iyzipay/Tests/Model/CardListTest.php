<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\CardList;
use Iyzipay\Request\RetrieveCardListRequest;

class CardListTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_cards()
    {
        $this->expectHttpPost();

        $cardList = CardList::retrieve(new RetrieveCardListRequest(), $this->options);

        $this->verifyResource($cardList);
    }
}