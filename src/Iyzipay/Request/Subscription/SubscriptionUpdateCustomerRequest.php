<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Model\Customer;
use Iyzipay\Request;

class SubscriptionUpdateCustomerRequest extends Request
{
    private $customer;
    private $customerReferenceCode;

    public function __construct()
    {
        $this->customer =  new Customer();
    }

    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode($customerReferenceCode)
    {
        $this->customerReferenceCode = $customerReferenceCode;
    }
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject($this->getCustomer()->getJsonObject($this->getLocale(),$this->getConversationId(),$this->getCustomerReferenceCode()))
            ->getObject();
    }
}