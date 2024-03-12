<?php

namespace Iyzipay\Request\Iyzilink;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class IyziLinkCreateFastLinkRequest extends Request {
    private string $description;
    private $price;
    private string $currencyCode;
    private string $sourceType;

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    public function getSourceType(): string {
        return $this->sourceType;
    }

    public function setSourceType(string $sourceType): void {
        $this->sourceType = $sourceType;
    }

    public function getJsonObject() {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('description', $this->getDescription())
            ->addPrice('price', $this->getPrice())
            ->add('currencyCode', $this->getCurrencyCode())
            ->add('sourceType', $this->getSourceType())
            ->getObject();
    }
}
