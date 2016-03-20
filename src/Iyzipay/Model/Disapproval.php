<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\DisapprovalMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateApprovalRequest;

class Disapproval extends IyzipayResource
{
    private $paymentTransactionId;

    public static function create(CreateApprovalRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/item/disapprove", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return DisapprovalMapper::create($rawResult)->jsonDecode()->mapDisapproval(new Disapproval());
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