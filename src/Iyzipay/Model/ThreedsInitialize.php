<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreedsInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;

class ThreedsInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreedsInitializeMapper::create($rawResult)->jsonDecode()->mapThreedsInitialize(new ThreedsInitialize());
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
