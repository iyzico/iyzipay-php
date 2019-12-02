<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionUpdatePricingPlanRequest extends Request
{
    private $name;
    private $pricingPlanReferenceCode;
    private $trialPeriodDays;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPricingPlanReferenceCode()
    {
        return $this->pricingPlanReferenceCode;
    }

    public function setPricingPlanReferenceCode($pricingPlanReferenceCode)
    {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }

    public function getTrialPeriodDays ()
    {
        return $this->trialPeriodDays ;
    }

    public function setTrialPeriodDays ($trialPeriodDays)
    {
        $this->trialPeriodDays = $trialPeriodDays;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->add("pricingPlanReferenceCode", $this->getPricingPlanReferenceCode())
            ->add("name", $this->getName())
            ->add("trialPeriodDays", $this->getTrialPeriodDays())
            ->getObject();
    }
}