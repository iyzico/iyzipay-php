<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Model\Subscription\SubscriptionDeleteCustomer;

class SubscriptionDeleteCustomerMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null) {
        return new SubscriptionDeleteCustomerMapper($rawResult);
    }

    public function mapSubscriptionDeleteCustomerFrom(SubscriptionDeleteCustomer $customer, object $jsonObject): SubscriptionDeleteCustomer {
        parent::mapResourceFrom($customer, $jsonObject);

        if (isset($jsonObject->customerReferenceCode)) {
            $customer->setCustomerReferenceCode($jsonObject->customerReferenceCode);
        }

        return $customer;
    }

    public function mapSubscriptionDeleteCustomer(SubscriptionDeleteCustomer $customer): SubscriptionDeleteCustomer {
        return $this->mapSubscriptionDeleteCustomerFrom($customer, $this->jsonObject);
    }
}


