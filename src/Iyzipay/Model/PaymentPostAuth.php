<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class PaymentPostAuth extends PaymentResource
{
    private $signature;

    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $uri = "/payment/postauth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PaymentPostAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPostAuth(new PaymentPostAuth());
    }

    public function getSignature() {
        return $this->signature;
    }

    public function setSignature($signature) {
        $this->signature = $signature;
    }

}