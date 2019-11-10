<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCustomer;

class SubscriptionCustomerMapper extends SubscriptionCustomerResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionCustomerMapper($rawResult);
    }

    public function mapSubscriptionCustomerFrom(SubscriptionCustomer $create, $jsonObject)
    {
        parent::mapSubscriptionCustomerResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionCustomer(SubscriptionCustomer $create)
    {
        return $this->mapSubscriptionCustomerFrom($create, $this->jsonObject);
    }
}