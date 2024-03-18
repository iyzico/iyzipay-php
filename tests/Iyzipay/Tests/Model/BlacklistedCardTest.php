<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BlacklistedCard;
use Iyzipay\Request\CreateBlackListedCardRequest;
use Iyzipay\Request\RetrieveBlacklistedCardRequest;
use Iyzipay\Request\UpdateBlackListedCardRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BlacklistedCardTest extends IyzipayResourceTestCase {
    public function test_should_create_blacklisted_card() {
        $this->expectHttpPost();
        $blacklistedCard = BlacklistedCard::create(new CreateBlackListedCardRequest(), $this->options);
        $this->verifyResource($blacklistedCard);
    }

    public function test_should_retrieve_blacklisted_card() {
        $this->expectHttpPost();
        $blacklistedCard = BlacklistedCard::retrieve(new RetrieveBlacklistedCardRequest(), $this->options);
        $this->verifyResource($blacklistedCard);
    }

    public function test_should_update_blacklisted_card() {
        $this->expectHttpPost();
        $blacklistedCard = BlacklistedCard::update(new UpdateBlackListedCardRequest(), $this->options);
        $this->verifyResource($blacklistedCard);
    }
}
