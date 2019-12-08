<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionSearchRequest extends Request
{

    private $page;
    private $count;
    private $subscriptionReferenceCode;
    private $parentReferenceCode;
    private $customerReferenceCode;
    private $pricingPlanReferenceCode;
    private $subscriptionStatus;
    private $startDate;
    private $endDate;

    public function getPage()
    {
        return $this->page;
    }
    public function setPage($page)
    {
        return $this->page = $page;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function setCount($count)
    {
        return $this->count = $count;
    }
    public function getSubscriptionReferenceCode()
    {
        return $this->subscriptionReferenceCode;
    }
    public function setSubscriptionReferenceCode($subscriptionReferenceCode)
    {
        return $this->subscriptionReferenceCode = $subscriptionReferenceCode;
    }
    public function getParentReferenceCode()
    {
        return $this->parentReferenceCode;
    }
    public function setParentReferenceCode($parentReferenceCode)
    {
        return $this->parentReferenceCode = $parentReferenceCode;
    }
    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode;
    }
    public function setCustomerReferenceCode($customerReferenceCode)
    {
        return $this->customerReferenceCode = $customerReferenceCode;
    }
    public function getPricingPlanReferenceCode()
    {
        return $this->pricingPlanReferenceCode;
    }
    public function setPricingPlanReferenceCode($pricingPlanReferenceCode)
    {
        return $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }
    public function setSubscriptionStatus($subscriptionStatus)
    {
        return $this->subscriptionStatus = $subscriptionStatus;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function setStartDate($startDate)
    {
        return $this->startDate = $startDate;
    }
    public function getEndDate()
    {
        return $this->endDate;
    }
    public function setEndDate($endDate)
    {
        return $this->endDate = $endDate;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->getObject();
    }
}
