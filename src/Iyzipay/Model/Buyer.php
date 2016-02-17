<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class Buyer extends BaseModel
{
    private $id;
    private $name;
    private $surname;
    private $identityNumber;
    private $email;
    private $gsmNumber;
    private $registrationDate;
    private $lastLoginDate;
    private $registrationAddress;
    private $city;
    private $country;
    private $zipCode;
    private $ip;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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

    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;
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

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }

    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
    }

    public function getRegistrationAddress()
    {
        return $this->registrationAddress;
    }

    public function setRegistrationAddress($registrationAddress)
    {
        $this->registrationAddress = $registrationAddress;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("id", $this->getId())
            ->add("name", $this->getName())
            ->add("surname", $this->getSurname())
            ->add("identityNumber", $this->getIdentityNumber())
            ->add("email", $this->getEmail())
            ->add("gsmNumber", $this->getGsmNumber())
            ->add("registrationDate", $this->getRegistrationDate())
            ->add("lastLoginDate", $this->getLastLoginDate())
            ->add("registrationAddress", $this->getRegistrationAddress())
            ->add("city", $this->getCity())
            ->add("country", $this->getCountry())
            ->add("zipCode", $this->getZipCode())
            ->add("ip", $this->getIp())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("id", $this->getId())
            ->append("name", $this->getName())
            ->append("surname", $this->getSurname())
            ->append("identityNumber", $this->getIdentityNumber())
            ->append("email", $this->getEmail())
            ->append("gsmNumber", $this->getGsmNumber())
            ->append("registrationDate", $this->getRegistrationDate())
            ->append("lastLoginDate", $this->getLastLoginDate())
            ->append("registrationAddress", $this->getRegistrationAddress())
            ->append("city", $this->getCity())
            ->append("country", $this->getCountry())
            ->append("zipCode", $this->getZipCode())
            ->append("ip", $this->getIp())
            ->getRequestString();
    }
}