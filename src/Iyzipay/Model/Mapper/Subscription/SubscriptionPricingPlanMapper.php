<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionPricingPlan;

class SubscriptionPricingPlanMapper extends SubscriptionPricingPlanResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionPricingPlanMapper($rawResult);
    }

    public function mapSubscriptionPricingPlanFrom(SubscriptionPricingPlan $create, $jsonObject)
    {
        parent::mapSubscriptionPricingPlanResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapSubscriptionPricingPlan(SubscriptionPricingPlan $create)
    {
        return $this->mapSubscriptionPricingPlanFrom($create, $this->jsonObject);
    }
}
