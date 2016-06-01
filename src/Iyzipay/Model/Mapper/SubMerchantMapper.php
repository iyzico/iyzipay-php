<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\SubMerchant;

class SubMerchantMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubMerchantMapper($rawResult);
    }

    public function mapSubMerchantFrom(SubMerchant $subMerchant, $jsonObject)
    {
        parent::mapResourceFrom($subMerchant, $jsonObject);

        if (isset($jsonObject->name)) {
            $subMerchant->setName($jsonObject->name);
        }
        if (isset($jsonObject->email)) {
            $subMerchant->setEmail($jsonObject->email);
        }
        if (isset($jsonObject->gsmNumber)) {
            $subMerchant->setGsmNumber($jsonObject->gsmNumber);
        }
        if (isset($jsonObject->address)) {
            $subMerchant->setAddress($jsonObject->address);
        }
        if (isset($jsonObject->iban)) {
            $subMerchant->setIban($jsonObject->iban);
        }
        if (isset($jsonObject->taxOffice)) {
            $subMerchant->setTaxOffice($jsonObject->taxOffice);
        }
        if (isset($jsonObject->contactName)) {
            $subMerchant->setContactName($jsonObject->contactName);
        }
        if (isset($jsonObject->contactSurname)) {
            $subMerchant->setContactSurname($jsonObject->contactSurname);
        }
        if (isset($jsonObject->legalCompanyTitle)) {
            $subMerchant->setLegalCompanyTitle($jsonObject->legalCompanyTitle);
        }
        if (isset($jsonObject->subMerchantExternalId)) {
            $subMerchant->setSubMerchantExternalId($jsonObject->subMerchantExternalId);
        }
        if (isset($jsonObject->identityNumber)) {
            $subMerchant->setIdentityNumber($jsonObject->identityNumber);
        }
        if (isset($jsonObject->taxNumber)) {
            $subMerchant->setTaxNumber($jsonObject->taxNumber);
        }
        if (isset($jsonObject->subMerchantType)) {
            $subMerchant->setSubMerchantType($jsonObject->subMerchantType);
        }
        if (isset($jsonObject->subMerchantKey)) {
            $subMerchant->setSubMerchantKey($jsonObject->subMerchantKey);
        }
        if (isset($jsonObject->swiftCode)) {
            $subMerchant->setSwiftCode($jsonObject->swiftCode);
        }
        if (isset($jsonObject->currency)) {
            $subMerchant->setCurrency($jsonObject->currency);
        }
        return $subMerchant;
    }

    public function mapSubMerchant(SubMerchant $subMerchant)
    {
        return $this->mapSubMerchantFrom($subMerchant, $this->jsonObject);
    }
}