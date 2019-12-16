<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionDetails;

class SubscriptionDetailsMapper extends SubscriptionDetailsResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionDetailsMapper($rawResult);
    }

    public function mapSubscriptionDetailsFrom(SubscriptionDetails $create, $jsonObject)
    {
        parent::mapSubscriptionDetailsResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionDetails(SubscriptionDetails $create)
    {
        return $this->mapSubscriptionDetailsFrom($create, $this->jsonObject);
    }
}