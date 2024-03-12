<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use \Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class UpdateBlackListedCardRequest extends Request {
    private string $cardUserKey = '';
    private string $cardToken = '';

    public function getCardUserKey(): string {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey): void {
        $this->cardUserKey = $cardUserKey;
    }

    public function getCardToken(): string {
        return $this->cardToken;
    }

    public function setCardToken($cardToken): void {
        $this->cardToken = $cardToken;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("cardToken", $this->getCardToken())
            ->add("cardUserKey", $this->getCardUserKey())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("cardToken", $this->getCardToken())
            ->append("cardUserKey", $this->getCardUserKey())
            ->getRequestString();
    }
}
