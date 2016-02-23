<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BinNumber;

class BinNumberMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BinNumberMapper();
    }

    public function mapBinNumber(BinNumber $binNumber, $jsonResult)
    {
        parent::mapResource($binNumber, $jsonResult);

        if (isset($jsonResult->binNumber)) {
            $binNumber->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->cardType)) {
            $binNumber->setCardType($jsonResult->cardType);
        }
        if (isset($jsonResult->cardAssociation)) {
            $binNumber->setCardAssociation($jsonResult->cardAssociation);
        }
        if (isset($jsonResult->cardFamily)) {
            $binNumber->setCardFamily($jsonResult->cardFamily);
        }
        if (isset($jsonResult->bankName)) {
            $binNumber->setBankName($jsonResult->bankName);
        }
        if (isset($jsonResult->bankCode)) {
            $binNumber->setBankCode($jsonResult->bankCode);
        }
        return $binNumber;
    }
}