<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class SubscriptionPricingPlanResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionPricingPlanResourceMapper($rawResult);
    }

    public function mapSubscriptionPricingPlanResourceFrom(SubscriptionPricingPlan $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data->status)) {
            $create->setPricingPlanStatus($jsonObject->data->status);
        }
        if (isset($jsonObject->data->name)) {
            $create->setName($jsonObject->data->name);
        }
        if (isset($jsonObject->data->productReferenceCode)) {
            $create->setProductReferenceCode($jsonObject->data->productReferenceCode);
        }
        if (isset($jsonObject->data->price)) {
            $create->setPrice($jsonObject->data->price);
        }
        if (isset($jsonObject->data->currencyCode)) {
            $create->setCurrencyCode($jsonObject->data->currencyCode);
        }
        if (isset($jsonObject->data->paymentInterval)) {
            $create->setPaymentInterval($jsonObject->data->paymentInterval);
        }
        if (isset($jsonObject->data->paymentIntervalCount)) {
            $create->setPaymentIntervalCount($jsonObject->data->paymentIntervalCount);
        }
        if (isset($jsonObject->data->trialPeriodDays)) {
            $create->setTrialPeriodDays($jsonObject->data->trialPeriodDays);
        }
        if (isset($jsonObject->data->planPaymentType)) {
            $create->setPlanPaymentType($jsonObject->data->planPaymentType);
        }
        if (isset($jsonObject->data->recurrenceCount)) {
            $create->setRecurrenceCount($jsonObject->data->recurrenceCount);
        }
        if (isset($jsonObject->data->referenceCode)) {
            $create->setReferenceCode($jsonObject->data->referenceCode);
        }
        if (isset($jsonObject->data->createdDate)) {
            $create->setCreatedDate($jsonObject->data->createdDate);
        }
        return $create;
    }

    public function mapSubscriptionPricingPlan(SubscriptionPricingPlan $subscriptionPricingPlan)
    {
        return $this->mapSubscriptionPricingPlanResourceFrom($subscriptionPricingPlan, $this->jsonObject);
    }

}