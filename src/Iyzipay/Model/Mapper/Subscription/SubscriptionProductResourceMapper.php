<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionProduct;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class SubscriptionProductResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionProductResourceMapper($rawResult);
    }

    public function mapSubscriptionProductResourceFrom(SubscriptionProduct $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->status)) {
            $create->setStatus($jsonObject->status);
        }
        if (isset($jsonObject->data->name)) {
            $create->setName($jsonObject->data->name);
        }
        if (isset($jsonObject->data->description)) {
            $create->setDescription($jsonObject->data->description);
        }
        if (isset($jsonObject->data->status)) {
            $create->setProductStatus($jsonObject->data->status);
        }

        if (isset($jsonObject->data->referenceCode)) {
            $create->setReferenceCode($jsonObject->data->referenceCode);
        }

        if (isset($jsonObject->data->pricingPlans)) {
            $create->setPricingPlans($jsonObject->data->pricingPlans);
        }

        if (isset($jsonObject->data->createdDate)) {
            $create->setCreatedDate($jsonObject->data->createdDate);
        }
        return $create;
    }

    public function mapSubscriptionProduct(SubscriptionProduct $subscriptionProduct)
    {
        return $this->mapSubscriptionProductResourceFrom($subscriptionProduct, $this->jsonObject);
    }

}