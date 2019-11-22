<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\RetrieveSubscriptionCheckoutForm;

class RetrieveSubscriptionCheckoutFormMapper extends RetrieveSubscriptionCheckoutFormResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RetrieveSubscriptionCheckoutFormMapper($rawResult);
    }

    public function mapRetrieveSubscriptionCheckoutFormFrom(RetrieveSubscriptionCheckoutForm $create, $jsonObject)
    {
        parent::mapRetrieveSubscriptionCheckoutFormResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionCreateCheckoutForm(RetrieveSubscriptionCheckoutForm $create)
    {
        return $this->mapRetrieveSubscriptionCheckoutFormFrom($create, $this->jsonObject);
    }
}