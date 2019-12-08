<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionListPricingPlanRequest extends Request
{

    private $page;
    private $count;
    private $productReferenceCode;

    public function getPage()
    {
        return $this->page;
    }

    public function setProductReferenceCode($productReferenceCode)
    {
        $this->productReferenceCode = $productReferenceCode;
    }

    public function getProductReferenceCode()
    {
        return $this->productReferenceCode;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->getObject();
    }

}