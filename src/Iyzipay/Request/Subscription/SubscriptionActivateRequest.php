<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionActivateRequest extends Request
{

    private $subscriptionReferenceCode;


    public function setSubscriptionReferenceCode($subscriptionReferenceCode)
    {
        $this->subscriptionReferenceCode = $subscriptionReferenceCode;
    }

    public function getSubscriptionReferenceCode()
    {
        return $this->subscriptionReferenceCode;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("subscriptionReferenceCode", $this->getSubscriptionReferenceCode())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->getObject();
    }
}