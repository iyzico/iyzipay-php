<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionProduct;

class SubscriptionProductMapper extends SubscriptionProductResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionProductMapper($rawResult);
    }

    public function mapSubscriptionProductFrom(SubscriptionProduct $create, $jsonObject)
    {
        parent::mapSubscriptionProductResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionProduct(SubscriptionProduct $create)
    {
        return $this->mapSubscriptionProductFrom($create, $this->jsonObject);
    }
}