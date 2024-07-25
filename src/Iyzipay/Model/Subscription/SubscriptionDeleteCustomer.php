<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Mapper\Subscription\SubscriptionDeleteCustomerMapper;
use Iyzipay\Request\Subscription\SubscriptionDeleteCustomerRequest;

class SubscriptionDeleteCustomer extends IyzipayResource {
    private string $customerReferenceCode;

    public static function delete(SubscriptionDeleteCustomerRequest $request, Options $options) {
        $uri = $options->getBaseUrl() . '/v2/subscription/customers/delete/' . $request->getCustomerReferenceCode() . RequestStringBuilder::requestToStringQuery($request);;
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, null, $options), null);
        return SubscriptionDeleteCustomerMapper::create($rawResult)->jsonDecode()->mapSubscriptionDeleteCustomer(new SubscriptionDeleteCustomer());
    }

    public function getCustomerReferenceCode(): string {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode(string $customerReferenceCode): void {
        $this->customerReferenceCode = $customerReferenceCode;
    }
}
