<?php

namespace Iyzipay\Model;

use Iyzipay\Options;
use Iyzipay\Model\Mapper\PlusInstallmentPaymentMapper;
use Iyzipay\Request\CreatePlusInstallmentPaymentRequest;

class PlusInstallmentPayment extends PlusInstallmentPaymentResource {
    public static function create(CreatePlusInstallmentPaymentRequest $request, Options $options) {
        $url = '/payment/auth';
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return PlusInstallmentPaymentMapper::create($rawResult)->jsonDecode()->mapPlusInstallmentPayment(new PlusInstallmentPayment());
    }
}
