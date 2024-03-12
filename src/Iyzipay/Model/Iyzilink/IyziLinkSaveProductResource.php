<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;

class IyziLinkSaveProductResource extends IyzipayResource
{
    private $base64EncodedImage;
    private $price;
    private $currency;
    private $addressIgnorable;
    private $soldLimit;
    private $installmentRequested;
    private $token;
    private $url;
    private $imageUrl;
    private $sourceType;
    private $stockEnabled;
    private $stockCount;

    public function getBase64EncodedImage()
    {
        return $this->base64EncodedImage;
    }

    public function getPrice()
    {
        return $this->price;
    }


    public function getCurrency()
    {
        return $this->currency;
    }

    public function getAddressIgnorable()
    {
        return $this->addressIgnorable;
    }

    public function getSoldLimit()
    {
        return $this->soldLimit;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    public function getSourceType()
    {
        return $this->sourceType;
    }

    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
    }

    public function getStockEnabled()
    {
        return $this->stockEnabled;
    }

    public function setStockEnabled($stockEnabled)
    {
        $this->stockEnabled = $stockEnabled;
    }

    public function getStockCount()
    {
        return $this->stockCount;
    }

    public function setStockCount($stockCount)
    {
        $this->stockCount = $stockCount;
    }
}