<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\SubMerchant;

class SubMerchantMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new SubMerchantMapper();
    }

    public function mapSubMerchant(SubMerchant $subMerchant, $jsonResult)
    {
        parent::mapResource($subMerchant, $jsonResult);

        if (isset($jsonResult->name)) {
            $subMerchant->setName($jsonResult->name);
        }
        if (isset($jsonResult->email)) {
            $subMerchant->setEmail($jsonResult->email);
        }
        if (isset($jsonResult->gsmNumber)) {
            $subMerchant->setGsmNumber($jsonResult->gsmNumber);
        }
        if (isset($jsonResult->address)) {
            $subMerchant->setAddress($jsonResult->address);
        }
        if (isset($jsonResult->iban)) {
            $subMerchant->setIban($jsonResult->iban);
        }
        if (isset($jsonResult->taxOffice)) {
            $subMerchant->setTaxOffice($jsonResult->taxOffice);
        }
        if (isset($jsonResult->contactName)) {
            $subMerchant->setContactName($jsonResult->contactName);
        }
        if (isset($jsonResult->contactSurname)) {
            $subMerchant->setContactSurname($jsonResult->contactSurname);
        }
        if (isset($jsonResult->legalCompanyTitle)) {
            $subMerchant->setLegalCompanyTitle($jsonResult->legalCompanyTitle);
        }
        if (isset($jsonResult->subMerchantExternalId)) {
            $subMerchant->setSubMerchantExternalId($jsonResult->subMerchantExternalId);
        }
        if (isset($jsonResult->identityNumber)) {
            $subMerchant->setIdentityNumber($jsonResult->identityNumber);
        }
        if (isset($jsonResult->taxNumber)) {
            $subMerchant->setTaxNumber($jsonResult->taxNumber);
        }
        if (isset($jsonResult->subMerchantType)) {
            $subMerchant->setSubMerchantType($jsonResult->subMerchantType);
        }
        if (isset($jsonResult->subMerchantKey)) {
            $subMerchant->setSubMerchantKey($jsonResult->subMerchantKey);
        }
        return $subMerchant;
    }
}