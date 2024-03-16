<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class AmountBaseRefundRequest extends Request {
    private string $paymentId;
    private float $price;
    private string $ip;

    public function getPaymentId(): string {
        return $this->paymentId;
    }

    public function setPaymentId(string $paymentId): void {
        $this->paymentId = $paymentId;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function setIp(string $ip): void {
        $this->ip = $ip;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('paymentId', $this->getPaymentId())
            ->addPrice('price', $this->getPrice())
            ->add('ip', $this->getIp())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->append('paymentId', $this->getPaymentId())
            ->appendPrice('price', $this->getPrice())
            ->append('ip', $this->getIp())
            ->getRequestString();
    }
}
