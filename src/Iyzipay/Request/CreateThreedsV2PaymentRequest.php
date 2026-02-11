<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateThreedsV2PaymentRequest extends Request {
    private ?string $paymentId = null;
    private ?float $paidPrice = null;
    private ?string $basketId = null;
    private ?string $currency = null;

    public function getPaymentId(): ?string {
        return $this->paymentId ?? null;
    }

    public function setPaymentId(string $paymentId): void {
        $this->paymentId = $paymentId;
    }

    public function getPaidPrice(): ?float {
        return $this->paidPrice;
    }

    public function setPaidPrice(float $paidPrice): void {
        $this->paidPrice = $paidPrice;
    }

    public function getBasketId(): ?string {
        return $this->basketId;
    }

    public function setBasketId(string $basketId): void {
        $this->basketId = $basketId;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    public function setCurrency(string $currency): void {
        $this->currency = $currency;
    }


    public function getJsonObject() {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->add("paymentId", $this->getPaymentId())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("basketId", $this->getBasketId())
            ->add("currency", $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString() {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("paymentId", $this->getPaymentId())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("basketId", $this->getBasketId())
            ->append("currency", $this->getCurrency())
            ->getRequestString();
    }
}