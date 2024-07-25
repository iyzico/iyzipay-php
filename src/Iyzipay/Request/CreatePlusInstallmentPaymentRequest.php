<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Model\Address;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\PaymentCard;

class CreatePlusInstallmentPaymentRequest extends Request {
    private float $price;
    private float $paidPrice;
    private string $currency;
    private int $installment;
    private string $paymentChannel;
    private string $basketId;
    private string $paymentGroup;
    private string $connectorName;
    private int $plusInstallmentUsage;
    private PaymentCard $paymentCard;
    private Buyer $buyer;
    private Address $shippingAddress;
    private Address $billingAddress;
    private array $basketItems;

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getPaidPrice(): float {
        return $this->paidPrice;
    }

    public function setPaidPrice(float $paidPrice): void {
        $this->paidPrice = $paidPrice;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function setCurrency(string $currency): void {
        $this->currency = $currency;
    }

    public function getInstallment(): int {
        return $this->installment;
    }

    public function setInstallment(int $installment): void {
        $this->installment = $installment;
    }

    public function getPaymentChannel(): string {
        return $this->paymentChannel;
    }

    public function setPaymentChannel(string $paymentChannel): void {
        $this->paymentChannel = $paymentChannel;
    }

    public function getBasketId(): string {
        return $this->basketId;
    }

    public function setBasketId(string $basketId): void {
        $this->basketId = $basketId;
    }

    public function getPaymentGroup(): string {
        return $this->paymentGroup;
    }

    public function setPaymentGroup(string $paymentGroup): void {
        $this->paymentGroup = $paymentGroup;
    }

    public function getConnectorName(): string {
        return $this->connectorName;
    }

    public function setConnectorName(string $connectorName): void {
        $this->connectorName = $connectorName;
    }

    public function getPlusInstallmentUsage(): int {
        return $this->plusInstallmentUsage;
    }

    public function setPlusInstallmentUsage(int $plusInstallmentUsage): void {
        $this->plusInstallmentUsage = $plusInstallmentUsage;
    }

    public function getPaymentCard(): PaymentCard {
        return $this->paymentCard;
    }

    public function setPaymentCard(PaymentCard $paymentCard): void {
        $this->paymentCard = $paymentCard;
    }

    public function getBuyer(): Buyer {
        return $this->buyer;
    }

    public function setBuyer(Buyer $buyer): void {
        $this->buyer = $buyer;
    }

    public function getShippingAddress(): Address {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }

    public function getBillingAddress(): Address {
        return $this->billingAddress;
    }

    public function setBillingAddress(Address $billingAddress): void {
        $this->billingAddress = $billingAddress;
    }

    public function getBasketItems(): array {
        return $this->basketItems;
    }

    public function setBasketItems(array $basketItems): void {
        $this->basketItems = $basketItems;
    }

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->addPrice('price', $this->getPrice())
            ->addPrice('paidPrice', $this->getPaidPrice())
//            ->add('currency', $this->getCurrency())
            ->add('installment', $this->getInstallment())
            ->add('paymentChannel', $this->getPaymentChannel())
            ->add('basketId', $this->getBasketId())
            ->add('paymentGroup', $this->getPaymentGroup())
//            ->add('connectorName', $this->getConnectorName())
//            ->add('plusInstallmentUsage', $this->getPlusInstallmentUsage())
            ->add('paymentCard', $this->getPaymentCard())
            ->add('buyer', $this->getBuyer())
            ->add('shippingAddress', $this->getShippingAddress())
            ->add('billingAddress', $this->getBillingAddress())
            ->addArray('basketItems', $this->getBasketItems())
            ->add('currency', $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->appendPrice('price', $this->getPrice())
            ->appendPrice('paidPrice', $this->getPaidPrice())
//            ->append('currency', $this->getCurrency())
            ->append('installment', $this->getInstallment())
            ->append('paymentChannel', $this->getPaymentChannel())
            ->append('basketId', $this->getBasketId())
            ->append('paymentGroup', $this->getPaymentGroup())
//            ->append('connectorName', $this->getConnectorName())
//            ->append('plusInstallmentUsage', $this->getPlusInstallmentUsage())
            ->append('paymentCard', $this->getPaymentCard())
            ->append('buyer', $this->getBuyer())
            ->append('shippingAddress', $this->getShippingAddress())
            ->append('billingAddress', $this->getBillingAddress())
            ->appendArray('basketItems', $this->getBasketItems())
            ->append('currency', $this->getCurrency())
            ->getRequestString();
    }
}