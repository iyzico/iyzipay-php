<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Model\Subscription\SubscriptionList;

class SubscriptionListMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): SubscriptionListMapper {
        return new SubscriptionListMapper($rawResult);
    }

    public function mapSubscriptionListFrom(SubscriptionList $subscriptionList, object $jsonObject): \Iyzipay\Model\Subscription\SubscriptionList {
        parent::mapResourceFrom($subscriptionList, $jsonObject);

        if (isset($jsonObject->subscriptionReferenceCode)) {
            $subscriptionList->setSubscriptionReferenceCode($jsonObject->subscriptionReferenceCode);
        }

        if (isset($jsonObject->subscriptionStatus)) {
            $subscriptionList->setSubscriptionStatus($jsonObject->subscriptionStatus);
        }

        if (isset($jsonObject->page)) {
            $subscriptionList->setPage($jsonObject->page);
        }

        if (isset($jsonObject->count)) {
            $subscriptionList->setCount($jsonObject->count);
        }

        if (isset($jsonObject->customerReferenceCode)) {
            $subscriptionList->setCustomerReferenceCode($jsonObject->customerReferenceCode);
        }

        if (isset($jsonObject->parentReferenceCode)) {
            $subscriptionList->setParentReferenceCode($jsonObject->parentReferenceCode);
        }

        if (isset($jsonObject->startDate)) {
            $subscriptionList->setStartDate($jsonObject->startDate);
        }

        if (isset($jsonObject->endDate)) {
            $subscriptionList->setEndDate($jsonObject->endDate);
        }

        if (isset($jsonObject->pricingPlanReferenceCode)) {
            $subscriptionList->setPricingPlanReferenceCode($jsonObject->pricingPlanReferenceCode);
        }

        return $subscriptionList;
    }

    public function mapSubscriptionList(SubscriptionList $subscriptionList): \Iyzipay\Model\Subscription\SubscriptionList {
        return $this->mapSubscriptionListFrom($subscriptionList, $this->jsonObject);
    }
}
