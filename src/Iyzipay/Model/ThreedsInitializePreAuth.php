<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreedsInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;

class ThreedsInitializePreAuth extends IyzipayResource
{
    private $htmlContent;
    private $paymentId;

    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $uri = "/payment/3dsecure/initialize/preauth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ThreedsInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapThreedsInitializePreAuth(new ThreedsInitializePreAuth());
    }

    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }
    private $signature;

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}
