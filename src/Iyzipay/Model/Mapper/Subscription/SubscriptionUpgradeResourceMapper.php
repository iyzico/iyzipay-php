<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionUpgrade;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class SubscriptionUpgradeResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionUpgradeResourceMapper($rawResult);
    }

    public function mapSubscriptionUpgradeResourceFrom(SubscriptionUpgrade $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data->referenceCode)) {
            $create->setReferenceCode($jsonObject->data->referenceCode);
        }
        if (isset($jsonObject->data->parentReferenceCode)){
            $create->setParentReferenceCode($jsonObject->data->parentReferenceCode);
        }
        if(isset($jsonObject->data->pricingPlanReferenceCode)){
            $create->setPricingPlanReferenceCode($jsonObject->data->pricingPlanReferenceCode);
        }
        if(isset($jsonObject->data->customerReferenceCode)){
            $create->setCustomerReferenceCode($jsonObject->data->customerReferenceCode);
        }
        if(isset($jsonObject->data->subscriptionStatus)){
            $create->setSubscriptionStatus($jsonObject->data->subscriptionStatus);
        }
        if(isset($jsonObject->data->trialDays)){
            $create->setTrialDays($jsonObject->data->trialDays);
        }
        if(isset($jsonObject->data->trialStartDate)){
            $create->setTrialStartDate($jsonObject->data->trialStartDate);
        }
        if(isset($jsonObject->data->trialEndDate)){
            $create->setTrialEndDate($jsonObject->data->trialEndDate);
        }
        if(isset($jsonObject->data->createdDate)){
            $create->setCreatedDate($jsonObject->data->createdDate);
        }
        if(isset($jsonObject->data->startDate)){
            $create->setStartDate($jsonObject->data->startDate);
        }
        if(isset($jsonObject->data->endDate)){
            $create->setEndDate($jsonObject->data->endDate);
        }

        return $create;
    }

    public function mapSubscriptionUpgrade(SubscriptionUpgrade $subscriptionUpgrade)
    {
        return $this->mapSubscriptionUpgradeResourceFrom($subscriptionUpgrade, $this->jsonObject);
    }
}