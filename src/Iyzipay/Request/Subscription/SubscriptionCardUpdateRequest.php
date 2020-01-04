<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionCardUpdateRequest extends Request
{

    private $customerReferenceCode;
    private $callbackUrl;

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }
    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode ;
    }

    public function setCustomerReferenceCode($customerReferenceCode)
    {
        $this->customerReferenceCode = $customerReferenceCode;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("customerReferenceCode", $this->getCustomerReferenceCode())
            ->getObject();
    }
}