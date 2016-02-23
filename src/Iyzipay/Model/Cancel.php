<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CancelMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCancelRequest;

class Cancel extends IyzipayResource
{
    private $paymentId;
    private $price;

    public static function create(CreateCancelRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/cancel", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CancelMapper::create()->mapCancel(new Cancel(), JsonBuilder::jsonDecode($rawResult));
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