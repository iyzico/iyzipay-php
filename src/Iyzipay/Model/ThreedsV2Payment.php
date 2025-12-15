<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ThreedsV2PaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreedsV2PaymentRequest;

class ThreedsV2Payment extends PaymentResource {
    private ?string $signature = null;

    public static function create(CreateThreedsV2PaymentRequest $request, Options $options): ThreedsV2Payment {
        $uri = "/payment/v2/3dsecure/auth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ThreedsV2PaymentMapper::create($rawResult)->jsonDecode()->mapThreedsV2Payment(new ThreedsV2Payment());
    }

    public function getSignature(): ?string {
        return $this->signature;
    }

    public function setSignature($signature): void {
        $this->signature = $signature;
    }
}