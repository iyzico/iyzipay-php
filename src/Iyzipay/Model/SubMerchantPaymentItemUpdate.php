<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\SubMerchantPaymentItemMapper;
use Iyzipay\Options;
use Iyzipay\Request\SubMerchantPaymentItemUpdateRequest;

class SubMerchantPaymentItemUpdate extends SubMerchantPaymentItemResource
{
    public static function create(SubMerchantPaymentItemUpdateRequest $request, Options $options)
    {
        $url = "/payment/item";
        $rawResult = parent::httpClient()->put($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return SubMerchantPaymentItemMapper::create($rawResult)->jsonDecode()->mapSubMerchantPaymentItem(new SubMerchantPaymentItemUpdate());
    }
}