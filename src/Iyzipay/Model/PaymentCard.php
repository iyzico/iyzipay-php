<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class PaymentCard extends BaseModel
{
    private $cardHolderName;
    private $cardNumber;
    private $expireYear;
    private $expireMonth;
    private $cvc;
    private $registerCard;
    private $cardAlias;
    private $cardToken;
    private $cardUserKey;
    private $registerConsumerCard;
    private $ucsToken;
    private $consumerToken;

    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    public function getExpireYear()
    {
        return $this->expireYear;
    }

    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
    }

    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    public function setExpireMonth($expireMonth)
    {
        $this->expireMonth = $expireMonth;
    }

    public function getCvc()
    {
        return $this->cvc;
    }

    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }

    public function getRegisterCard()
    {
        return $this->registerCard;
    }

    public function setRegisterCard($registerCard)
    {
        $this->registerCard = $registerCard;
    }

    public function getCardAlias()
    {
        return $this->cardAlias;
    }

    public function setCardAlias($cardAlias)
    {
        $this->cardAlias = $cardAlias;
    }

    public function getCardToken()
    {
        return $this->cardToken;
    }

    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
    }

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getRegisterConsumerCard()
    {
        return $this->registerConsumerCard;
    }

    public function setRegisterConsumerCard($registerConsumerCard)
    {
        $this->registerConsumerCard = $registerConsumerCard;
    }

    public function getUcsToken()
    {
        return $this->ucsToken;
    }

    public function setUcsToken($ucsToken)
    {
        $this->ucsToken = $ucsToken;
    }

    public function setConsumerToken($consumerToken)
    {
        $this->consumerToken = $consumerToken;
    }

    public function getConsumerToken()
    {
        return $this->consumerToken;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("cardHolderName", $this->getCardHolderName())
            ->add("cardNumber", $this->getCardNumber())
            ->add("expireYear", $this->getExpireYear())
            ->add("expireMonth", $this->getExpireMonth())
            ->add("cvc", $this->getCvc())
            ->add("registerCard", $this->getRegisterCard())
            ->add("cardAlias", $this->getCardAlias())
            ->add("cardToken", $this->getCardToken())
            ->add("cardUserKey", $this->getCardUserKey())
            ->add("registerConsumerCard", $this->getRegisterConsumerCard())
            ->add("consumerToken", $this->getConsumerToken())
            ->add("ucsToken", $this->getUcsToken())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("cardHolderName", $this->getCardHolderName())
            ->append("cardNumber", $this->getCardNumber())
            ->append("expireYear", $this->getExpireYear())
            ->append("expireMonth", $this->getExpireMonth())
            ->append("cvc", $this->getCvc())
            ->append("registerCard", $this->getRegisterCard())
            ->append("cardAlias", $this->getCardAlias())
            ->append("cardToken", $this->getCardToken())
            ->append("cardUserKey", $this->getCardUserKey())
            ->append("registerConsumerCard", $this->getRegisterConsumerCard())
            ->append("consumerToken", $this->getConsumerToken())
            ->append("ucsToken", $this->getUcsToken())
            ->getRequestString();
    }
}