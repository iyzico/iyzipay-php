<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\SubMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateSubMerchantRequest;
use Iyzipay\Request\RetrieveSubMerchantRequest;
use Iyzipay\Request\UpdateSubMerchantRequest;

class SubMerchant extends IyzipayResource
{
    private $name;
    private $email;
    private $gsmNumber;
    private $address;
    private $iban;
    private $swiftCode;
    private $currency;
    private $taxOffice;
    private $contactName;
    private $contactSurname;
    private $legalCompanyTitle;
    private $subMerchantExternalId;
    private $identityNumber;
    private $taxNumber;
    private $subMerchantType;
    private $subMerchantKey;

    const URL = "/onboarding/submerchant";

    public static function create(CreateSubMerchantRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . self::URL, parent::getHttpHeadersV2(self::URL, $request, $options), $request->toJsonString());
        return SubMerchantMapper::create($rawResult)->jsonDecode()->mapSubMerchant(new SubMerchant());
    }

    public static function update(UpdateSubMerchantRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->put($options->getBaseUrl() . self::URL, parent::getHttpHeadersV2(self::URL, $request, $options), $request->toJsonString());
        return SubMerchantMapper::create($rawResult)->jsonDecode()->mapSubMerchant(new SubMerchant());
    }

    public static function retrieve(RetrieveSubMerchantRequest $request, Options $options)
    {
        $url = self::URL . "/detail";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return SubMerchantMapper::create($rawResult)->jsonDecode()->mapSubMerchant(new SubMerchant());
    }

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

    public function getSubMerchantExternalId()
    {
        return $this->subMerchantExternalId;
    }

    public function setSubMerchantExternalId($subMerchantExternalId)
    {
        $this->subMerchantExternalId = $subMerchantExternalId;
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

    public function getSubMerchantType()
    {
        return $this->subMerchantType;
    }

    public function setSubMerchantType($subMerchantType)
    {
        $this->subMerchantType = $subMerchantType;
    }

    public function getSubMerchantKey()
    {
        return $this->subMerchantKey;
    }

    public function setSubMerchantKey($subMerchantKey)
    {
        $this->subMerchantKey = $subMerchantKey;
    }
}