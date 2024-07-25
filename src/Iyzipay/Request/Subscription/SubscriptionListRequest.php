<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionListRequest extends Request {
    private string $subscriptionReferenceCode;
    private string $subscriptionStatus;
    private int $page;
    private int $count;
    private string $customerReferenceCode;
    private string $parentReferenceCode;
    private string $startDate;
    private string $endDate;
    private string $pricingPlanReferenceCode;

    public function getSubscriptionReferenceCode(): ?string {
        return $this->subscriptionReferenceCode ?? null;
    }

    public function setSubscriptionReferenceCode(string $subscriptionReferenceCode): void {
        $this->subscriptionReferenceCode = $subscriptionReferenceCode;
    }

    public function getSubscriptionStatus(): ?string {
        return $this->subscriptionStatus ?? null;
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

    public function getCustomerReferenceCode(): ?string {
        return $this->customerReferenceCode ?? null;
    }

    public function setCustomerReferenceCode(string $customerReferenceCode): void {
        $this->customerReferenceCode = $customerReferenceCode;
    }

    public function getParentReferenceCode(): ?string {
        return $this->parentReferenceCode ?? null;
    }

    public function setParentReferenceCode(string $parentReferenceCode): void {
        $this->parentReferenceCode = $parentReferenceCode;
    }

    public function getStartDate(): ?string {
        return $this->startDate ?? null;
    }

    public function setStartDate(string $startDate): void {
        $this->startDate = urlencode($startDate);
    }

    public function getEndDate(): ?string {
        return $this->endDate ?? null;
    }

    public function setEndDate(string $endDate): void {
        $this->endDate = urlencode($endDate);
    }

    public function getPricingPlanReferenceCode(): ?string {
        return $this->pricingPlanReferenceCode ?? null;
    }

    public function setPricingPlanReferenceCode(string $pricingPlanReferenceCode): void {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('subscriptionReferenceCode', $this->getSubscriptionReferenceCode())
            ->add('subscriptionStatus', $this->getSubscriptionStatus())
            ->add('page', $this->getPage())
            ->add('count', $this->getCount())
            ->add('customerReferenceCode', $this->getCustomerReferenceCode())
            ->add('parentReferenceCode', $this->getParentReferenceCode())
            ->add('startDate', $this->getStartDate())
            ->add('endDate', $this->getEndDate())
            ->add('pricingPlanReferenceCode', $this->getPricingPlanReferenceCode())
            ->getObject();
    }
}
