<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateCardRequest extends Request
{
    private $externalId;
    private $email;
    private $cardUserKey;
    private $card;

    public function getExternalId()
    {
        return $this->externalId;
    }

    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function setCard($card)
    {
        $this->card = $card;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("externalId", $this->getExternalId())
            ->add("email", $this->getEmail())
            ->add("cardUserKey", $this->getCardUserKey())
            ->add("card", $this->getCard())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("externalId", $this->getExternalId())
            ->append("email", $this->getEmail())
            ->append("cardUserKey", $this->getCardUserKey())
            ->append("card", $this->getCard())
            ->getRequestString();
    }
}