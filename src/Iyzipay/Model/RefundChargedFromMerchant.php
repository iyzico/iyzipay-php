<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\RefundChargedFromMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class RefundChargedFromMerchant extends IyzipayResource
{
    private $paymentId;
    private $paymentTransactionId;
    private $price;
    private $currency;

    public static function create(CreateRefundRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/refund/merchant/charge", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return RefundChargedFromMerchantMapper::create($rawResult)->jsonDecode()->mapRefundChargedFromMerchant(new RefundChargedFromMerchant());
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
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
}