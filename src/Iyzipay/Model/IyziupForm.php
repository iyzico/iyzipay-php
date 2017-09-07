<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\IyziupFormMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveIyziupFormRequest;

class IyziupForm extends IyzipayResource
{
    private $orderResponseStatus;
    private $token;
    private $callbackUrl;
    private $consumer;
    private $shippingAddress;
    private $billingAddress;
    private $paymentDetail;


    public static function retrieve(RetrieveIyziupFormRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/v1/iyziup/form/order/retrieve", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return IyziupFormMapper::create($rawResult)->jsonDecode()->mapIyziupForm(new IyziupForm());
    }

    public function getOrderResponseStatus()
    {
        return $this->orderResponseStatus;
    }

    public function setOrderResponseStatus($orderResponseStatus)
    {
        $this->orderResponseStatus = $orderResponseStatus;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getConsumer()
    {
        return $this->consumer;
    }

    public function setConsumer($consumer)
    {
        $this->consumer = $consumer;
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

    public function getPaymentDetail()
    {
        return $this->paymentDetail;
    }

    public function setPaymentDetail($paymentDetail)
    {
        $this->paymentDetail = $paymentDetail;
    }
}