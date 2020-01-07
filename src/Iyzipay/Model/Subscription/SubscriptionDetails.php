<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionDetailsMapper;
use Iyzipay\Request\Subscription\SubscriptionDetailsRequest;
use Iyzipay\RequestStringBuilder;


class SubscriptionDetails extends IyzipayResource
{
    private $referenceCode;
    private $parentReferenceCode;
    private $pricingPlanReferenceCode;
    private $customerReferenceCode;
    private $subscriptionStatus;
    private $trialDays;
    private $trialStartDate;
    private $trialEndDate;
    private $createdDate;
    private $startDate;
    private $orders;
    private $customerEmail;
    private $pricingPlanName;
    private $productName;
    private $productReferenceCode;
    private $endDate;

    public static function retrieve(SubscriptionDetailsRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/subscriptions/".$request->getSubscriptionReferenceCode().RequestStringBuilder::requestToStringQuery($request, 'defaultParams');;
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return SubscriptionDetailsMapper::create($rawResult)->jsonDecode()->mapSubscriptionDetails(new SubscriptionDetails());
    }


    public function getProductReferenceCode()
    {
        return $this->productReferenceCode;
    }
    public function setProductReferenceCode($productReferenceCode)
    {
        $this->productReferenceCode = $productReferenceCode;
    }
    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }
    public function getPricingPlanName()
    {
        return $this->pricingPlanName;
    }
    public function setPricingPlanName($pricingPlanName)
    {
        $this->pricingPlanName = $pricingPlanName;
    }
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }
    public function getOrders()
    {
        return $this->orders;
    }
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }
    public function getReferenceCode()
    {
        return $this->referenceCode;
    }
    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
    }
    public function getParentReferenceCode()
    {
        return $this->parentReferenceCode;
    }
    public function setParentReferenceCode($parentReferenceCode)
    {
        $this->parentReferenceCode = $parentReferenceCode;
    }
    public function getPricingPlanReferenceCode()
    {
        return $this->pricingPlanReferenceCode;
    }
    public function setPricingPlanReferenceCode($pricingPlanReferenceCode)
    {
        $this->pricingPlanReferenceCode = $pricingPlanReferenceCode;
    }
    public function getCustomerReferenceCode()
    {
        return $this->customerReferenceCode;
    }
    public function setCustomerReferenceCode($customerReferenceCode)
    {
        $this->customerReferenceCode= $customerReferenceCode;
    }
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }
    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->subscriptionStatus = $subscriptionStatus;
    }
    public function getTrialDays()
    {
        return $this->trialDays;
    }
    public function setTrialDays($trialDays)
    {
        $this->trialDays = $trialDays;
    }
    public function getTrialStartDate()
    {
        return $this->trialStartDate;
    }
    public function setTrialStartDate($trialStartDate)
    {
        $this->trialStartDate = $trialStartDate;
    }
    public function getTrialEndDate()
    {
        return $this->trialEndDate;
    }
    public function setTrialEndDate($trialEndDate)
    {
        $this->trialEndDate = $trialEndDate;
    }
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function getEndDate(){
        return $this->endDate;
    }
    public function setEndDate($endDate){
        $this->endDate = $endDate;
    }
}
