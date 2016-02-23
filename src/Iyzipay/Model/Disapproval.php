<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\DisapprovalMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateApprovalRequest;

class Disapproval extends IyzipayResource
{
    private $paymentTransactionId;

    public static function create(CreateApprovalRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/item/disapprove", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return DisapprovalMapper::create()->mapDisapproval(new Disapproval(), JsonBuilder::jsonDecode($rawResult));
    }

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }
}