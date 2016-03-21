<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Card;
use Iyzipay\Request\CreateCardRequest;
use Iyzipay\Request\DeleteCardRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CardTest extends IyzipayResourceTestCase
{
    public function test_should_create_card()
    {
        $this->expectHttpPost();

        $card = Card::create(new CreateCardRequest(), $this->options);

        $this->verifyResource($card);
    }

    public function test_should_delete_card()
    {
        $this->expectHttpDelete();

        $card = Card::delete(new DeleteCardRequest(), $this->options);

        $this->verifyResource($card);
    }
}