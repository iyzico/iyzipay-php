<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class DeleteCardRequest extends Request
{
    private $cardUserKey;
    private $cardToken;

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getCardToken()
    {
        return $this->cardToken;
    }

    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("cardUserKey", $this->getCardUserKey())
            ->add("cardToken", $this->getCardToken())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("cardUserKey", $this->getCardUserKey())
            ->append("cardToken", $this->getCardToken())
            ->getRequestString();
    }
}