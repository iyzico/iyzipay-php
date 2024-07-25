<?php

namespace Iyzipay\Model;

use Iyzipay\Options;
use Iyzipay\Model\Mapper\PlusInstallmentPaymentMapper;
use Iyzipay\Request\CreatePlusInstallmentPaymentRequest;

class PlusInstallmentPayment extends PlusInstallmentPaymentResource {
    public static function create(CreatePlusInstallmentPaymentRequest $request, Options $options) {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . '/payment/auth', parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PlusInstallmentPaymentMapper::create($rawResult)->jsonDecode()->mapPlusInstallmentPayment(new PlusInstallmentPayment());
    }
}
