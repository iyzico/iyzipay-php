<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest extends Request
{

    private $subscriptionReferenceCode;
    private $callbackUrl;

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getSubscriptionReferenceCode()
    {
        return $this->subscriptionReferenceCode ;
    }

    public function setSubscriptionReferenceCode($subscriptionReferenceCode)
    {
        $this->subscriptionReferenceCode = $subscriptionReferenceCode;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("subscriptionReferenceCode", $this->getSubscriptionReferenceCode())
            ->getObject();
    }
}