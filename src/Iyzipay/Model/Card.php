<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\CardMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCardRequest;
use Iyzipay\Request\DeleteCardRequest;

class Card extends IyzipayResource
{
    private $externalId;
    private $email;
    private $cardUserKey;
    private $cardToken;
    private $cardAlias;
    private $binNumber;
    private $lastFourDigits;
    private $cardType;
    private $cardAssociation;
    private $cardFamily;
    private $cardBankCode;
    private $cardBankName;

    public static function create(CreateCardRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/cardstorage/card", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CardMapper::create($rawResult)->jsonDecode()->mapCard(new Card());
    }

    public static function delete(DeleteCardRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->delete($options->getBaseUrl() . "/cardstorage/card", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CardMapper::create($rawResult)->jsonDecode()->mapCard(new Card());
    }

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

    public function getCardToken()
    {
        return $this->cardToken;
    }

    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
    }

    public function getCardAlias()
    {
        return $this->cardAlias;
    }

    public function setCardAlias($cardAlias)
    {
        $this->cardAlias = $cardAlias;
    }

    public function getBinNumber()
    {
        return $this->binNumber;
    }

    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function getLastFourDigits()
    {
        return $this->lastFourDigits;
    }

    public function setLastFourDigits($lastFourDigits)
    {
        $this->lastFourDigits = $lastFourDigits;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getCardAssociation()
    {
        return $this->cardAssociation;
    }

    public function setCardAssociation($cardAssociation)
    {
        $this->cardAssociation = $cardAssociation;
    }

    public function getCardFamily()
    {
        return $this->cardFamily;
    }

    public function setCardFamily($cardFamily)
    {
        $this->cardFamily = $cardFamily;
    }

    public function getCardBankCode()
    {
        return $this->cardBankCode;
    }

    public function setCardBankCode($cardBankCode)
    {
        $this->cardBankCode = $cardBankCode;
    }

    public function getCardBankName()
    {
        return $this->cardBankName;
    }

    public function setCardBankName($cardBankName)
    {
        $this->cardBankName = $cardBankName;
    }
}
