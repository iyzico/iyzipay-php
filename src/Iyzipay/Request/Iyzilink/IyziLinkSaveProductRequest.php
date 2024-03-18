<?php

namespace Iyzipay\Request\Iyzilink;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class IyziLinkSaveProductRequest extends Request
{
    private $name;
    private $description;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getBase64EncodedImage()
    {
        return $this->base64EncodedImage;
    }

    public function setBase64EncodedImage($base64EncodedImage)
    {
        $this->base64EncodedImage = $base64EncodedImage;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getAddressIgnorable()
    {
        return $this->addressIgnorable;
    }

    public function setAddressIgnorable($addressIgnorable)
    {
        $this->addressIgnorable = $addressIgnorable;
    }

    public function getSoldLimit()
    {
        return $this->soldLimit;
    }

    public function setSoldLimit($soldLimit)
    {
        $this->soldLimit = $soldLimit;
    }

    public function getInstallmentRequested()
    {
        return $this->installmentRequested;
    }

    public function setInstallmentRequest($installmentRequested)
    {
        $this->installmentRequested = $installmentRequested;
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

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->addPrice("price", $this->getPrice())
            ->add("name", $this->getName())
            ->add("description", $this->getDescription())
            ->add("encodedImageFile", $this->getBase64EncodedImage())
            ->add("currencyCode", $this->getCurrency())
            ->add("addressIgnorable", $this->getAddressIgnorable())
            ->add("soldLimit", $this->getSoldLimit())
            ->add("installmentRequested", $this->getInstallmentRequested())
            ->add("token", $this->getToken())
            ->add("url", $this->getUrl())
            ->add("imageUrl", $this->getImageUrl())
            ->add('sourceType', $this->getSourceType())
            ->add('stockEnabled', $this->getStockEnabled())
            ->add('stockCount', $this->getStockCount())
            ->getObject();
    }
}