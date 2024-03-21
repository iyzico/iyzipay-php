<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionDeleteCustomerRequest extends Request {
    private string $customerReferenceCode;

    public function getCustomerReferenceCode(): string {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode(string $customerReferenceCode): void {
        $this->customerReferenceCode = $customerReferenceCode;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('customerReferenceCode', $this->getCustomerReferenceCode())
            ->getObject();
    }
}
