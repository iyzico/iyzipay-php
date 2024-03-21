<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Mapper\Subscription\SubscriptionListMapper;
use Iyzipay\Request\Subscription\SubscriptionListRequest;

class SubscriptionList extends IyzipayResource {
    private string $subscriptionReferenceCode;
    private string $subscriptionStatus;
    private int $page;
    private int $count;
    private string $customerReferenceCode;
    private string $parentReferenceCode;
    private string $startDate;
    private string $endDate;
    private string $pricingPlanReferenceCode;

    public static function create(SubscriptionListRequest $request, Options $options) {
        $uri = $options->getBaseUrl() . '/v2/subscription/subscriptions' . RequestStringBuilder::requestToStringQuery($request, 'searchSubscription');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return SubscriptionListMapper::create($rawResult)->jsonDecode()->mapSubscriptionList(new SubscriptionList());
    }

    public function getSubscriptionReferenceCode(): string {
        return $this->subscriptionReferenceCode;
    }

    public function setSubscriptionReferenceCode(string $subscriptionReferenceCode): void {
        $this->subscriptionReferenceCode = $subscriptionReferenceCode;
    }

    public function getSubscriptionStatus(): string {
        return $this->subscriptionStatus;
    }

    public function setSubscriptionStatus(string $subscriptionStatus): void {
        $this->subscriptionStatus = $subscriptionStatus;
    }

    public function getPage(): int {
        return $this->page;
    }

    public function setPage(int $page): void {
        $this->page = $page;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function setCount(int $count): void {
        $this->count = $count;
    }

//
    public function getCustomerReferenceCode(): string {
        return $this->customerReferenceCode;
    }

    public function setCustomerReferenceCode(string $customerReferenceCode): void {
        $this->customerReferenceCode = $customerReferenceCode;
    }

    public function getParentReferenceCode(): string {
        return $this->parentReferenceCode;
    }

    public function setParentReferenceCode(string $parentReferenceCode): void {
        $this->parentReferenceCode = $parentReferenceCode;
    }

    public function getStartDate(): string {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void {
        $this->startDate = urlencode($startDate);
    }

    public function getEndDate(): string {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): void {
        $this->endDate = urlencode($endDate);
    }


    public function getPricingPlanReferenceCode(): string {
        return $this->pricingPlanReferenceCode;
    }

    public function setPricingPlanReferenceCode(string $pricingPlanReferenceCode): void {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }
}
