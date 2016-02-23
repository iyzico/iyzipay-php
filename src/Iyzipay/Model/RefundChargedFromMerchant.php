<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\RefundChargedFromMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class RefundChargedFromMerchant extends IyzipayResource
{
    private $paymentId;
    private $paymentTransactionId;
    private $price;

    public static function create(CreateRefundRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/refund/merchant/charge", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return RefundChargedFromMerchantMapper::create()->mapRefundChargedFromMerchant(new RefundChargedFromMerchant(), JsonBuilder::jsonDecode($rawResult));
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
}