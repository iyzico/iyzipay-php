<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateSubMerchantRequest extends Request
{
    private $name;
    private $email;
    private $gsmNumber;
    private $address;
    private $iban;
    private $taxOffice;
    private $contactName;
    private $contactSurname;
    private $legalCompanyTitle;
    private $swiftCode;
    private $currency;
    private $identityNumber;
    private $taxNumber;
    private $subMerchantExternalId;
    private $subMerchantType;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getIban()
    {
        return $this->iban;
    }

    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    public function getTaxOffice()
    {
        return $this->taxOffice;
    }

    public function setTaxOffice($taxOffice)
    {
        $this->taxOffice = $taxOffice;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    public function getContactSurname()
    {
        return $this->contactSurname;
    }

    public function setContactSurname($contactSurname)
    {
        $this->contactSurname = $contactSurname;
    }

    public function getLegalCompanyTitle()
    {
        return $this->legalCompanyTitle;
    }

    public function setLegalCompanyTitle($legalCompanyTitle)
    {
        $this->legalCompanyTitle = $legalCompanyTitle;
    }

    public function getSwiftCode()
    {
        return $this->swiftCode;
    }

    public function setSwiftCode($swiftCode)
    {
        $this->swiftCode = $swiftCode;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;
    }

    public function getTaxNumber()
    {
        return $this->taxNumber;
    }

    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $taxNumber;
    }

    public function getSubMerchantExternalId()
    {
        return $this->subMerchantExternalId;
    }

    public function setSubMerchantExternalId($subMerchantExternalId)
    {
        $this->subMerchantExternalId = $subMerchantExternalId;
    }

    public function getSubMerchantType()
    {
        return $this->subMerchantType;
    }

    public function setSubMerchantType($subMerchantType)
    {
        $this->subMerchantType = $subMerchantType;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("name", $this->getName())
            ->add("email", $this->getEmail())
            ->add("gsmNumber", $this->getGsmNumber())
            ->add("address", $this->getAddress())
            ->add("iban", $this->getIban())
            ->add("taxOffice", $this->getTaxOffice())
            ->add("contactName", $this->getContactName())
            ->add("contactSurname", $this->getContactSurname())
            ->add("legalCompanyTitle", $this->getLegalCompanyTitle())
            ->add("swiftCode", $this->getSwiftCode())
            ->add("currency", $this->getCurrency())
            ->add("subMerchantExternalId", $this->getSubMerchantExternalId())
            ->add("identityNumber", $this->getIdentityNumber())
            ->add("taxNumber", $this->getTaxNumber())
            ->add("subMerchantType", $this->getSubMerchantType())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("name", $this->getName())
            ->append("email", $this->getEmail())
            ->append("gsmNumber", $this->getGsmNumber())
            ->append("address", $this->getAddress())
            ->append("iban", $this->getIban())
            ->append("taxOffice", $this->getTaxOffice())
            ->append("contactName", $this->getContactName())
            ->append("contactSurname", $this->getContactSurname())
            ->append("legalCompanyTitle", $this->getLegalCompanyTitle())
            ->append("swiftCode", $this->getSwiftCode())
            ->append("currency", $this->getCurrency())
            ->append("subMerchantExternalId", $this->getSubMerchantExternalId())
            ->append("identityNumber", $this->getIdentityNumber())
            ->append("taxNumber", $this->getTaxNumber())
            ->append("subMerchantType", $this->getSubMerchantType())
            ->getRequestString();
    }
}