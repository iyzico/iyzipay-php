<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\RefundMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class Refund extends IyzipayResource
{
    private $paymentId;
    private $paymentTransactionId;
    private $price;
    private $currency;
    private $connectorName;

    public static function create(CreateRefundRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/refund", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return RefundMapper::create($rawResult)->jsonDecode()->mapRefund(new Refund());
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

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }
}