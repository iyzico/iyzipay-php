<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class PayWithIyzicoWidgetBasketItem extends BaseModel
{
    private $price;
    private $name;
    private $category;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->addPrice("price", $this->getPrice())
            ->add("name", $this->getName())
            ->add("category", $this->getCategory())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendPrice("price", $this->getPrice())
            ->append("name", $this->getName())
            ->append("category", $this->getCategory())
            ->getRequestString();
    }
}
