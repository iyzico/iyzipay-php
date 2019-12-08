<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\Model\Customer;


class SubscriptionCreateCustomerRequest extends Request
{
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

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject($this->getCustomer()->getJsonObject($this->getLocale(),$this->getConversationId()))
            ->getObject();
    }
}