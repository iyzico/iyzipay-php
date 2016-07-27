<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundChargedFromMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundRequest;

class RefundChargedFromMerchant extends RefundResource
{
    public static function create(CreateRefundRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/refund/merchant/charge", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return RefundChargedFromMerchantMapper::create($rawResult)->jsonDecode()->mapRefundChargedFromMerchant(new RefundChargedFromMerchant());
    }
}