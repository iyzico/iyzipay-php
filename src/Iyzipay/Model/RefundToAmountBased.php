<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundToAmountBasedMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundToAmountBasedRequest;

class RefundToAmountBased extends RefundToAmountBasedResource
{
    public static function create(CreateRefundToAmountBasedRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/v2/payment/refund", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return RefundToAmountBasedMapper::create($rawResult)->jsonDecode()->mapRefundToAmountBased(new RefundToAmountBased());
    }
}