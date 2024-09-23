<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundToBalanceMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundToBalanceRequest;

class RefundToBalance extends RefundToBalanceResource
{
    public static function create(CreateRefundToBalanceRequest $request, Options $options)
    {
        $url = "/payment/refund-to-balance/init";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());

        return RefundToBalanceMapper::create($rawResult)->jsonDecode()->mapRefundToBalance(new RefundToBalance());
    }
}