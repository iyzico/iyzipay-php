<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionCreateWithCustomerRequest extends Request
{

    private $pricingPlanReferenceCode;
    private $subscriptionInitialStatus;
    private $customerReferenceCode;


    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode($customerReferenceCode)
    {
        $this->customerReferenceCode = $customerReferenceCode;
    }

    public function getPricingPlanReferenceCode()
    {
        return $this->pricingPlanReferenceCode;
    }

    public function setPricingPlanReferenceCode($pricingPlanReferenceCode)
    {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }

    public function getSubscriptionInitialStatus()
    {
        return $this->subscriptionInitialStatus;
    }

    public function setSubscriptionInitialStatus($subscriptionInitialStatus)
    {
        $this->subscriptionInitialStatus = $subscriptionInitialStatus;
    }


    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->add("pricingPlanReferenceCode", $this->getPricingPlanReferenceCode())
            ->add("subscriptionInitialStatus", $this->getSubscriptionInitialStatus())
            ->add("customerReferenceCode", $this->getCustomerReferenceCode())
            ->getObject();
    }
}