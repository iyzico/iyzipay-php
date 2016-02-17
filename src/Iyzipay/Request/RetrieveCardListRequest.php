<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveCardListRequest extends Request
{
    private $cardUserKey;

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("cardUserKey", $this->getCardUserKey())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("cardUserKey", $this->getCardUserKey())
            ->getRequestString();
    }
}