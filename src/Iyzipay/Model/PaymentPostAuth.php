<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\PaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class PaymentPostAuth extends IyzipayResource
{
    private $paymentId;
    private $price;

    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/postauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentPostAuthMapper::create()->mapPaymentPostAuth(new PaymentPostAuth(), JsonBuilder::jsonDecode($rawResult));
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
}