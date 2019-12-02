<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionCreatePricingPlanRequest extends Request
{
    private $name;
    private $productReferenceCode;
    private $price;
    private $currencyCode;
    private $paymentInterval;
    private $paymentIntervalCount;
    private $trialPeriodDays;
    private $planPaymentType;
    private $recurrenceCount;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getProductReferenceCode()
    {
        return $this->productReferenceCode;
    }

    public function setProductReferenceCode($productReferenceCode)
    {
        $this->productReferenceCode = $productReferenceCode;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function SetPrice($price)
    {
        $this->price = $price;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    public function getPaymentInterval()
    {
        return $this->paymentInterval;
    }

    public function setPaymentInterval($paymentInterval)
    {
        $this->paymentInterval = $paymentInterval;
    }

    public function getPaymentIntervalCount()
    {
        return $this->paymentIntervalCount;
    }

    public function setPaymentIntervalCount($paymentIntervalCount)
    {
        $this->paymentIntervalCount = $paymentIntervalCount;
    }
    public function getTrialPeriodDays ()
    {
        return $this->trialPeriodDays ;
    }

    public function setTrialPeriodDays ($trialPeriodDays)
    {
        $this->trialPeriodDays = $trialPeriodDays;
    }
    public function getPlanPaymentType()
    {
        return $this->planPaymentType;
    }

    public function setPlanPaymentType($planPaymentType)
    {
        $this->planPaymentType = $planPaymentType;
    }
    public function setRecurrenceCount($recurrenceCount)
    {
        $this->recurrenceCount = $recurrenceCount;
    }
    public function getRecurrenceCount()
    {
        return $this->recurrenceCount;
    }


    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("productReferenceCode", $this->getProductReferenceCode())
            ->add("name", $this->getName())
            ->add("price", $this->getPrice())
            ->add("currencyCode", $this->getCurrencyCode())
            ->add("paymentInterval", $this->getPaymentInterval())
            ->add("paymentIntervalCount", $this->getPaymentIntervalCount())
            ->add("trialPeriodDays", $this->getTrialPeriodDays())
            ->add("planPaymentType", $this->getPlanPaymentType())
            ->add("recurrenceCount", $this->getRecurrenceCount())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->getObject();
    }
}