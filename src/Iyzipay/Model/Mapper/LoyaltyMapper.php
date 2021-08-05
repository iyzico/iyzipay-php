<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Loyalty;

class LoyaltyMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new LoyaltyMapper($rawResult);
    }

    public function mapLoyaltyFrom(Loyalty $loyalty, $jsonObject)
    {
        parent::mapResourceFrom($loyalty, $jsonObject);

        if (isset($jsonObject->points)) {
            $loyalty->setPoints($jsonObject->points);
        }
        if (isset($jsonObject->amount)) {
            $loyalty->setAmount($jsonObject->amount);
        }
        if (isset($jsonObject->cardBank)) {
            $loyalty->setCardBank($jsonObject->cardBank);
        }
        if (isset($jsonObject->cardFamily)) {
            $loyalty->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->currency)) {
            $loyalty->setCurrency($jsonObject->currency);
        }

        return $loyalty;
    }

    public function mapLoyalty(Loyalty $loyalty)
    {
        return $this->mapLoyaltyFrom($loyalty, $this->jsonObject);
    }
}