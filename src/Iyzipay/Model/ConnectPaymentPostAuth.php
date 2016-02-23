<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectPaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class ConnectPaymentPostAuth extends IyzipayResource
{
    private $paymentId;
    private $price;
    private $connectorName;

    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/postauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectPaymentPostAuthMapper::create()->mapConnectPaymentPostAuth(new ConnectPaymentPostAuth(), JsonBuilder::jsonDecode($rawResult));
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
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