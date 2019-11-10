<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCreateCheckoutForm;

class SubscriptionCreateCheckoutFormMapper extends SubscriptionCreateCheckoutFormResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionCreateCheckoutFormMapper($rawResult);
    }

    public function mapSubscriptionCreateCheckoutFormFrom(SubscriptionCreateCheckoutForm $create, $jsonObject)
    {
        parent::mapSubscriptionCreateCheckoutFormResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionCreateCheckoutForm(SubscriptionCreateCheckoutForm $create)
    {
        return $this->mapSubscriptionCreateCheckoutFormFrom($create, $this->jsonObject);
    }
}