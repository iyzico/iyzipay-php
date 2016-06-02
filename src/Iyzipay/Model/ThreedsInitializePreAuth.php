<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreedsInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;

class ThreedsInitializePreAuth extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/initialize/preauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
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
}
