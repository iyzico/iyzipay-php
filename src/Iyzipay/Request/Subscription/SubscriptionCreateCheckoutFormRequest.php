<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Model\Customer;
use Iyzipay\Request;

class SubscriptionCreateCheckoutFormRequest extends Request
{

    private $pricingPlanReferenceCode;
    private $callbackUrl;
    private $subscriptionInitialStatus;
    private $customer;

    public function __construct()
    {
        $this->customer =  new Customer();
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
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
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("pricingPlanReferenceCode", $this->getPricingPlanReferenceCode())
            ->add("subscriptionInitialStatus", $this->getSubscriptionInitialStatus())
            ->add("customer",
                $this->getCustomer()->getJsonObject($locale = null,$conversationId= null, $customerReferenceCode = null)
            )
            ->getObject();
    }
}