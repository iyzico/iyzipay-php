<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BinNumber;

class BinNumberMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BinNumberMapper($rawResult);
    }

    public function mapBinNumberFrom(BinNumber $binNumber, $jsonObject)
    {
        parent::mapResourceFrom($binNumber, $jsonObject);

        if (isset($jsonObject->binNumber)) {
            $binNumber->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->cardType)) {
            $binNumber->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $binNumber->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $binNumber->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->bankName)) {
            $binNumber->setBankName($jsonObject->bankName);
        }
        if (isset($jsonObject->bankCode)) {
            $binNumber->setBankCode($jsonObject->bankCode);
        }
        if (isset($jsonObject->commercial)) {
            $binNumber->setCommercial($jsonObject->commercial);
        }
        return $binNumber;
    }

    public function mapBinNumber(BinNumber $binNumber)
    {
        return $this->mapBinNumberFrom($binNumber, $this->jsonObject);
    }
}