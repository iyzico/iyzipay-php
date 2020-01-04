<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Mapper\Subscription\RetrieveListMapper;
use Iyzipay\Request\Subscription\SubscriptionListProductsRequest;
use Iyzipay\Request\Subscription\SubscriptionListCustomersRequest;
use Iyzipay\Request\Subscription\SubscriptionListPricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionSearchRequest;


class RetrieveList extends IyzipayResource
{

    private $totalCount;
    private $currentPage;
    private $pageCount;
    private $items;

    public static function products(SubscriptionListProductsRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products".RequestStringBuilder::requestToStringQuery($request, 'subscriptionItems');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return RetrieveListMapper::create($rawResult)->jsonDecode()->mapRetrieveList(new RetrieveList());
    }

    public static function pricingPlan(SubscriptionListPricingPlanRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/products/".$request->getProductReferenceCode()."/pricing-plans".RequestStringBuilder::requestToStringQuery($request, 'subscriptionItems');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return RetrieveListMapper::create($rawResult)->jsonDecode()->mapRetrieveList(new RetrieveList());
    }

    public static function customers(SubscriptionListCustomersRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers".RequestStringBuilder::requestToStringQuery($request, 'subscriptionItems');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return RetrieveListMapper::create($rawResult)->jsonDecode()->mapRetrieveList(new RetrieveList());
    }


    public static function subscriptions(SubscriptionSearchRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/subscriptions".RequestStringBuilder::requestToStringQuery($request, 'searchSubscription');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
        return RetrieveListMapper::create($rawResult)->jsonDecode()->mapRetrieveList(new RetrieveList());
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function getPageCount()
    {
        return $this->pageCount;
    }

    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}