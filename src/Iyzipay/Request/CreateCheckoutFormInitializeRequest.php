<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateCheckoutFormInitializeRequest extends Request
{
    private $price;
    private $paidPrice;
    private $basketId;
    private $paymentGroup;
    private $paymentSource;
    private $currency;
    private $buyer;
    private $shippingAddress;
    private $billingAddress;
    private $basketItems;
    private $callbackUrl;
    private $forceThreeDS;
    private $cardUserKey;
    private $posOrderId;
    private $enabledInstallments;
    private $debitCardAllowed;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPaidPrice()
    {
        return $this->paidPrice;
    }

    public function setPaidPrice($paidPrice)
    {
        $this->paidPrice = $paidPrice;
    }

    public function getBasketId()
    {
        return $this->basketId;
    }

    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
    }

    public function getPaymentGroup()
    {
        return $this->paymentGroup;
    }

    public function setPaymentGroup($paymentGroup)
    {
        $this->paymentGroup = $paymentGroup;
    }

    public function getPaymentSource()
    {
        return $this->paymentSource;
    }

    public function setPaymentSource($paymentSource)
    {
        $this->paymentSource = $paymentSource;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    public function getBasketItems()
    {
        return $this->basketItems;
    }

    public function setBasketItems($basketItems)
    {
        $this->basketItems = $basketItems;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getForceThreeDS()
    {
        return $this->forceThreeDS;
    }

    public function setForceThreeDS($forceThreeDS)
    {
        $this->forceThreeDS = $forceThreeDS;
    }

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getPosOrderId()
    {
        return $this->posOrderId;
    }

    public function setPosOrderId($posOrderId)
    {
        $this->posOrderId = $posOrderId;
    }

    public function setEnabledInstallments($enabledInstallments)
    {
        $this->enabledInstallments = $enabledInstallments;
    }

    public function getEnabledInstallments()
    {
        return $this->enabledInstallments;
    }
    
    public function setDebitCardAllowed($debitCardAllowed)
    {
        $this->debitCardAllowed = $debitCardAllowed;
    }
    
    public function getDebitCardAllowed()
    {
        return $this->debitCardAllowed;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->addPrice("price", $this->getPrice())
            ->add("basketId", $this->getBasketId())
            ->add("paymentGroup", $this->getPaymentGroup())
            ->add("buyer", $this->getBuyer())
            ->add("shippingAddress", $this->getShippingAddress())
            ->add("billingAddress", $this->getBillingAddress())
            ->addArray("basketItems", $this->getBasketItems())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("paymentSource", $this->getPaymentSource())
            ->add("currency", $this->getCurrency())
            ->add("posOrderId", $this->getPosOrderId())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("forceThreeDS", $this->getForceThreeDS())
            ->add("cardUserKey", $this->getCardUserKey())
            ->addArray("enabledInstallments", $this->getEnabledInstallments())
            ->add("debitCardAllowed", $this->getDebitCardAllowed())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->appendPrice("price", $this->getPrice())
            ->append("basketId", $this->getBasketId())
            ->append("paymentGroup", $this->getPaymentGroup())
            ->append("buyer", $this->getBuyer())
            ->append("shippingAddress", $this->getShippingAddress())
            ->append("billingAddress", $this->getBillingAddress())
            ->appendArray("basketItems", $this->getBasketItems())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->append("paymentSource", $this->getPaymentSource())
            ->append("currency", $this->getCurrency())
            ->append("posOrderId", $this->getPosOrderId())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("forceThreeDS", $this->getForceThreeDS())
            ->append("cardUserKey", $this->getCardUserKey())
            ->appendArray("enabledInstallments", $this->getEnabledInstallments())
            ->append("debitCardAllowed", $this->getDebitCardAllowed())
            ->getRequestString();
    }
}