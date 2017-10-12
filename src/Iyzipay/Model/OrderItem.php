<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class OrderItem extends BaseModel
{
    private $id;
    private $price;
    private $name;
    private $category1;
    private $category2;
    private $itemType;
    private $itemUrl;
    private $itemDescription;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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

    public function getCategory1()
    {
        return $this->category1;
    }

    public function setCategory1($category1)
    {
        $this->category1 = $category1;
    }

    public function getCategory2()
    {
        return $this->category2;
    }

    public function setCategory2($category2)
    {
        $this->category2 = $category2;
    }

    public function getItemType()
    {
        return $this->itemType;
    }

    public function setItemType($itemType)
    {
        $this->itemType = $itemType;
    }

    public function getItemUrl()
    {
        return $this->itemUrl;
    }

    public function setItemUrl($itemUrl)
    {
        $this->itemUrl = $itemUrl;
    }

    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    public function setItemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("id", $this->getId())
            ->addPrice("price", $this->getPrice())
            ->add("name", $this->getName())
            ->add("category1", $this->getCategory1())
            ->add("category2", $this->getCategory2())
            ->add("itemType", $this->getItemType())
            ->add("itemUrl", $this->getItemUrl())
            ->add("itemDescription", $this->getItemDescription())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("id", $this->getId())
            ->appendPrice("price", $this->getPrice())
            ->append("name", $this->getName())
            ->append("category1", $this->getCategory1())
            ->append("category2", $this->getCategory2())
            ->append("itemType", $this->getItemType())
            ->append("itemUrl", $this->getItemUrl())
            ->append("itemDescription", $this->getItemDescription())
            ->getRequestString();
    }
}