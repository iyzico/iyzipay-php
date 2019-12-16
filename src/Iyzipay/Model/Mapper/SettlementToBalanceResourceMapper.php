<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\SettlementToBalanceResource;

class SettlementToBalanceResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SettlementToBalanceResourceMapper($rawResult);
    }

    public function mapSettlementToBalanceResourceFrom(SettlementToBalanceResource $settlementToBalanceResource, $jsonObject)
    {
        parent::mapResourceFrom($settlementToBalanceResource, $jsonObject);

        if (isset($jsonObject->url)) {
            $settlementToBalanceResource->setUrl($jsonObject->url);
        }
        if (isset($jsonObject->token)) {
            $settlementToBalanceResource->setToken($jsonObject->token);
        }
        if (isset($jsonObject->settingsAllTime)) {
            $settlementToBalanceResource->setSettingsAllTime($jsonObject->settingsAllTime);
        }

        return $settlementToBalanceResource;
    }

    public function mapSettlementToBalanceResource(SettlementToBalanceResource $settlementToBalanceResource)
    {
        return $this->mapSettlementToBalanceResourceFrom($settlementToBalanceResource, $this->jsonObject);
    }
}