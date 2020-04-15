<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCustomer;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class SubscriptionCustomerResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionCustomerResourceMapper($rawResult);
    }

    public function mapSubscriptionCustomerResourceFrom(SubscriptionCustomer $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data->referenceCode)) {
            $create->setReferenceCode($jsonObject->data->referenceCode);
        }
        if (isset($jsonObject->data->status)) {
            $create->setCustomerStatus($jsonObject->data->status);
        }
        if (isset($jsonObject->data->name)) {
            $create->setName($jsonObject->data->name);
        }
        if (isset($jsonObject->data->surname)) {
            $create->setSurname($jsonObject->data->surname);
        }
        if (isset($jsonObject->data->identityNumber)) {
            $create->setIdentityNumber($jsonObject->data->identityNumber);
        }
        if (isset($jsonObject->data->email)) {
            $create->setEmail($jsonObject->data->email);
        }
        if (isset($jsonObject->data->gsmNumber)) {
            $create->setGsmNumber($jsonObject->data->gsmNumber);
        }
        if (isset($jsonObject->data->contactEmail)) {
            $create->setContactEmail($jsonObject->data->contactEmail);
        }
        if (isset($jsonObject->data->contactGsmNumber)) {
            $create->setContactGsmNumber($jsonObject->data->contactGsmNumber);
        }
        if (isset($jsonObject->data->billingAddress->contactName)) {
            $create->setBillingContactName($jsonObject->data->billingAddress->contactName);
        }
        if (isset($jsonObject->data->billingAddress->city)) {
            $create->setBillingCity($jsonObject->data->billingAddress->city);
        }
        if (isset($jsonObject->data->billingAddress->district)) {
            $create->setBillingDistrict($jsonObject->data->billingAddress->district);
        }
        if (isset($jsonObject->data->billingAddress->country)) {
            $create->setBillingCountry($jsonObject->data->billingAddress->country);
        }
        if (isset($jsonObject->data->billingAddress->address)) {
            $create->setBillingAddress($jsonObject->data->billingAddress->address);
        }
        if (isset($jsonObject->data->billingAddress->zipCode)) {
            $create->setBillingZipCode($jsonObject->data->billingAddress->zipCode);
        }

        if (isset($jsonObject->data->shippingAddress->contactName)) {
            $create->setShippingContactName($jsonObject->data->shippingAddress->contactName);
        }
        if (isset($jsonObject->data->shippingAddress->city)) {
            $create->setShippingCity($jsonObject->data->shippingAddress->city);
        }
        if (isset($jsonObject->data->shippingAddress->district)) {
            $create->setShippingDistrict($jsonObject->data->shippingAddress->district);
        }
        if (isset($jsonObject->data->shippingAddress->country)) {
            $create->setShippingCountry($jsonObject->data->shippingAddress->country);
        }
        if (isset($jsonObject->data->shippingAddress->address)) {
            $create->setShippingAddress($jsonObject->data->shippingAddress->address);
        }
        if (isset($jsonObject->data->shippingAddress->zipCode)) {
            $create->setShippingZipCode($jsonObject->data->shippingAddress->zipCode);
        }

        if (isset($jsonObject->data->createdDate)) {
            $create->setCreatedDate($jsonObject->data->createdDate);
        }
        return $create;
    }

    public function mapSubscriptionCustomer(SubscriptionCustomer $subscriptionCustomer)
    {
        return $this->mapSubscriptionCustomerResourceFrom($subscriptionCustomer, $this->jsonObject);
    }

}