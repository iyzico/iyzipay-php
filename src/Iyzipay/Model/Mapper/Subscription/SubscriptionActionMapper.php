<?php

namespace Iyzipay\Model\Mapper\Subscription;

class SubscriptionActionMapper extends SubscriptionActionResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionActionMapper($rawResult);
    }

    public function mapSubscriptionActionFrom($create, $jsonObject)
    {
        parent::mapSubscriptionActionResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionAction( $create)
    {
        return $this->mapSubscriptionActionFrom($create, $this->jsonObject);
    }
}