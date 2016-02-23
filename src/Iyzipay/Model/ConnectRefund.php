<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectRefundMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class ConnectRefund extends IyzipayResource
{
    private $paymentId;
    private $paymentTransactionId;
    private $price;
    private $connectorName;

    public static function create(CreateRefundRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/refund", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectRefundMapper::create()->mapConnectRefund(new ConnectRefund(), JsonBuilder::jsonDecode($rawResult));
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

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }
}