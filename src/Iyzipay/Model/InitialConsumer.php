<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class InitialConsumer extends BaseModel
{
    private $name;
    private $surname;
    private $email;
    private $gsmNumber;
    private $addressList;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGsmNumber()
    {
        return $this->gsmNumber;
    }

    public function setGsmNumber($gsmNumber)
    {
        $this->gsmNumber = $gsmNumber;
    }

    public function getAddressList()
    {
        return $this->addressList;
    }

    public function setAddressList($addressList)
    {
        $this->addressList = $addressList;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("name", $this->getName())
            ->add("surname", $this->getSurname())
            ->add("email", $this->getEmail())
            ->add("gsmNumber", $this->getGsmNumber())
            ->addArray("addressList", $this->getAddressList())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("name", $this->getName())
            ->append("surname", $this->getSurname())
            ->append("email", $this->getEmail())
            ->append("gsmNumber", $this->getGsmNumber())
            ->appendArray("addressList", $this->getAddressList())
            ->getRequestString();
    }
}