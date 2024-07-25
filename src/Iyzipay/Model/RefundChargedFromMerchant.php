<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundChargedFromMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class RefundChargedFromMerchant extends RefundResource
{
    public static function create(CreateRefundRequest $request, Options $options)
    {
        $url = "/payment/iyzipos/refund/merchant/charge";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return RefundChargedFromMerchantMapper::create($rawResult)->jsonDecode()->mapRefundChargedFromMerchant(new RefundChargedFromMerchant());
    }
}