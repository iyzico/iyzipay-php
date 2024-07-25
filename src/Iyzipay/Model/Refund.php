<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class Refund extends RefundResource
{
    public static function create(CreateRefundRequest $request, Options $options)
    {
        $url = "/payment/refund";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return RefundMapper::create($rawResult)->jsonDecode()->mapRefund(new Refund());
    }
}