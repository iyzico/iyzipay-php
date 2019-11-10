<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCreate;

class SubscriptionCreateMapper extends SubscriptionCreateResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionCreateMapper($rawResult);
    }

    public function mapSubscriptionCreateFrom(SubscriptionCreate $create, $jsonObject)
    {
        parent::mapSubscriptionCreateResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionCreate(SubscriptionCreate $create)
    {
        return $this->mapSubscriptionCreateFrom($create, $this->jsonObject);
    }
}