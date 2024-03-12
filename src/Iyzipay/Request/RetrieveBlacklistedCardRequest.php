<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveBlacklistedCardRequest extends Request {
    private string $cardNumber = '';

    public function getCardNumber(): string {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): void {
        $this->cardNumber = $cardNumber;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("cardNumber", $this->getCardNumber())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("cardNumber", $this->getCardNumber())
            ->getRequestString();
    }
}