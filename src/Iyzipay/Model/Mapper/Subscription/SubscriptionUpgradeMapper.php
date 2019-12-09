<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionUpgrade;

class SubscriptionUpgradeMapper extends SubscriptionUpgradeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionUpgradeMapper($rawResult);
    }

    public function mapSubscriptionUpgradeFrom(SubscriptionUpgrade $create, $jsonObject)
    {
        parent::mapSubscriptionUpgradeResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionUpgrade(SubscriptionUpgrade $create)
    {
        return $this->mapSubscriptionUpgradeFrom($create, $this->jsonObject);
    }
}