<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class IyziupAddress extends BaseModel
{
    private $alias;
    private $addressLine1;
    private $addressLine2;
    private $zipCode;
    private $contactName;
    private $city;
    private $country;

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
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

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("alias", $this->getAlias())
            ->add("addressLine1", $this->getAddressLine1())
            ->add("addressLine2", $this->getAddressLine2())
            ->add("zipCode", $this->getZipCode())
            ->add("contactName", $this->getContactName())
            ->add("city", $this->getCity())
            ->add("country", $this->getCountry())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("alias", $this->getAlias())
            ->append("addressLine1", $this->getAddressLine1())
            ->append("addressLine2", $this->getAddressLine2())
            ->append("zipCode", $this->getZipCode())
            ->append("contactName", $this->getContactName())
            ->append("city", $this->getCity())
            ->append("country", $this->getCountry())
            ->getRequestString();
    }
}