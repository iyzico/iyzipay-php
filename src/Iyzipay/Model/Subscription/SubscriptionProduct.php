<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Mapper\Subscription\SubscriptionProductMapper;
use Iyzipay\Request\Subscription\SubscriptionCreateProductRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateProductRequest;
use Iyzipay\Request\Subscription\SubscriptionDeleteProductRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrieveProductRequest;

class SubscriptionProduct extends IyzipayResource
{

    private $name;
    private $description;
    private $referenceCode;
    private $productStatus;
    private $pricingPlans;
    private $createdDate;

    public static function create(SubscriptionCreateProductRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersIsV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionProductMapper::create($rawResult)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());
    }

    public static function retrieve(SubscriptionRetrieveProductRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products/" . $request->getProductReferenceCode() . RequestStringBuilder::requestToStringQuery($request, 'defaultParams');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersIsV2($uri, null, $options), $request->toJsonString());
        return SubscriptionProductMapper::create($rawResult)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());
    }

    public static function update(SubscriptionUpdateProductRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products/" . $request->getProductReferenceCode();
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersIsV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionProductMapper::create($rawResult)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());
    }

    public static function delete(SubscriptionDeleteProductRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products/" . $request->getProductReferenceCode() . RequestStringBuilder::requestToStringQuery($request, 'defaultParams');
        $rawResult = parent::httpClient()->delete($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionProductMapper::create($rawResult)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getProductStatus()
    {
        return $this->productStatus;
    }

    public function setProductStatus($productStatus)
    {
        $this->productStatus = $productStatus;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function getPricingPlans()
    {
        return $this->pricingPlans;
    }

    public function setPricingPlans($pricingPlans)
    {
        $this->pricingPlans = $pricingPlans;
    }
}
