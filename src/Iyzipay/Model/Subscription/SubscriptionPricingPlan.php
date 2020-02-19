<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Mapper\Subscription\SubscriptionPricingPlanMapper;
use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionDeletePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrievePricingPlanRequest;

class SubscriptionPricingPlan extends IyzipayResource
{

    private $name;
    private $productReferenceCode;
    private $referenceCode;
    private $price;
    private $currencyCode;
    private $paymentInterval;
    private $paymentIntervalCount;
    private $trialPeriodDays;
    private $planPaymentType;
    private $pricingPlanStatus;
    private $recurrenceCount;
    private $createdDate;

    public static function create(SubscriptionCreatePricingPlanRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products/".$request->getProductReferenceCode()."/pricing-plans";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionPricingPlanMapper::create($rawResult)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());
    }

    public static function retrieve(SubscriptionRetrievePricingPlanRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/pricing-plans/".$request->getPricingPlanReferenceCode().RequestStringBuilder::requestToStringQuery($request, 'defaultParams');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return SubscriptionPricingPlanMapper::create($rawResult)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());
    }

    public static function update(SubscriptionUpdatePricingPlanRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/pricing-plans/".$request->getPricingPlanReferenceCode();
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionPricingPlanMapper::create($rawResult)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());
    }

    public static function delete(SubscriptionDeletePricingPlanRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/pricing-plans/".$request->getPricingPlanReferenceCode().RequestStringBuilder::requestToStringQuery($request, 'defaultParams');
        $rawResult = parent::httpClient()->delete($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionPricingPlanMapper::create($rawResult)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());
    }

    public function getPricingPlanStatus()
    {
        return $this->pricingPlanStatus;
    }

    public function setPricingPlanStatus($pricingPlanStatus)
    {
        $this->pricingPlanStatus = $pricingPlanStatus;
    }
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
    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
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

    public function getRecurrenceCount()
    {
        return $this->recurrenceCount;
    }

    public function setRecurrenceCount($recurrenceCount)
    {
        $this->recurrenceCount = $recurrenceCount;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }
}
