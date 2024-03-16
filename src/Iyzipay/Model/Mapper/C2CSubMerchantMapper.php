<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\C2CSubMerchant;

class C2CSubMerchantMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): C2CSubMerchantMapper {
        return new C2CSubMerchantMapper($rawResult);
    }

    public function mapC2CSubMerchantFrom(C2CSubMerchant $c2CSubMerchant, object $jsonObject): C2CSubMerchant {
        parent::mapResourceFrom($c2CSubMerchant, $jsonObject);

        if (isset($jsonObject->name)) {
            $c2CSubMerchant->setName($jsonObject->name);
        }

        if (isset($jsonObject->surname)) {
            $c2CSubMerchant->setSurname($jsonObject->surname);
        }

        if (isset($jsonObject->email)) {
            $c2CSubMerchant->setEmail($jsonObject->email);
        }

        if (isset($jsonObject->gsmNumber)) {
            $c2CSubMerchant->setGsmNumber($jsonObject->gsmNumber);
        }

        if (isset($jsonObject->tckNo)) {
            $c2CSubMerchant->setTckNo($jsonObject->tckNo);
        }

        if (isset($jsonObject->birthDate)) {
            $c2CSubMerchant->setBirthDate($jsonObject->birthDate);
        }

        if (isset($jsonObject->address)) {
            $c2CSubMerchant->setAddress($jsonObject->address);
        }

        if (isset($jsonObject->externalId)) {
            $c2CSubMerchant->setExternalId($jsonObject->externalId);
        }

        if (isset($jsonObject->txId)) {
            $c2CSubMerchant->setTxId($jsonObject->txId);
        }

        if (isset($jsonObject->smsVerificationCode)) {
            $c2CSubMerchant->setSmsVerificationCode($jsonObject->smsVerificationCode);
        }

        return $c2CSubMerchant;
    }

    public function mapC2CSubMerchant(C2CSubMerchant $c2CSubMerchant): C2CSubMerchant {
        return $this->mapC2CSubMerchantFrom($c2CSubMerchant, $this->jsonObject);
    }
}
