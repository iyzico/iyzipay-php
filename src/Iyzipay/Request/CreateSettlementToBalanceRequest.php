<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateSettlementToBalanceRequest extends Request
{
    private $subMerchantKey;
    private $callbackUrl;
    private $price;

    public function getSubMerchantKey()
    {
        return $this->subMerchantKey;
    }

    public function setSubMerchantKey($subMerchantKey)
    {
        $this->subMerchantKey = $subMerchantKey;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("subMerchantKey", $this->getSubMerchantKey())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->addPrice("price", $this->getPrice())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("subMerchantKey", $this->getSubMerchantKey())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->appendPrice("price", $this->getPrice())
            ->getRequestString();
    }
}