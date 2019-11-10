<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionRetryRequest extends Request
{

    private $referenceCode;


    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
    }

    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("referenceCode", $this->getReferenceCode())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->getObject();
    }
}