<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionRetrievePricingPlanRequest extends Request
{

    private $pricingPlanReferenceCode;


    public function getPricingPlanReferenceCode()
    {
        return $this->pricingPlanReferenceCode;
    }

    public function setPricingPlanReferenceCode($pricingPlanReferenceCode)
    {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }



    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->getObject();
    }
}