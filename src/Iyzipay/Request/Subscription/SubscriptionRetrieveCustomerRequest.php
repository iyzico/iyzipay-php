<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionRetrieveCustomerRequest extends Request
{

    private $customerReferenceCode;


    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode($customerReferenceCode)
    {
        $this->customerReferenceCode = $customerReferenceCode;
    }


    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->getObject();
    }
}